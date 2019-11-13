<?php

namespace App\Http\Controllers;

use App\Character;
use App\CharacterImage;
use App\Helpers\UploadHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $characters = Character::get(['id', 'fullname', 'gender']);

        return $request->ajax() ? response()->json(['data' => $characters]) : view('characters.index');
    }
        
    public function store(Request $request)
    {
        // try {
            $validator = Validator::make($request->all(), [
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => "The file must be an image with type: jpeg, png, jpg, gif!"
                ]);
            }
            
            $character = Character::create([
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'gender' => $request->sex,
                'description' => $request->description
            ]);

            
            if ($request->hasFile('images')) {
                $images = [];

                foreach($request->file('images') as $image) {
                    $imageName = UploadHelper::uploadImage(
                        $image, 
                        $request->nickname,
                        'characters'
                    );

                    $images[] = ['image' => $imageName, 'character_id' => $character->id];
                }
                CharacterImage::insert($images);
            }
            
            return response()->json([
                'success' => "Data added successfully!"
            ]);
       
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'error' => "Failed data execution!"
        //     ]);
        // }

    }
    
    public function edit($id)
    {
        $character = Character::findOrFail($id);

        return response()->json($character);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $character = Character::findOrFail($id);

            $character->update([
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'gender' => $request->sex,
                'description' => $request->description
            ]);

            if ($request->hasFile('images')) {
                $images = [];

                foreach($request->file('images') as $image) {
                    $imageName = UploadHelper::uploadImage(
                        $image, 
                        $request->nickname,
                        'characters'
                    );

                    $images[] = ['image' => $imageName, 'character_id' => $id];
                }
                CharacterImage::insert($images);
            }
            
            return response()->json([
                'success' => "Data updated successfully!"
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Failed data execution!",
                'message' => $th
            ]);
        }
    }


    public function destroy($id)
    {
        $character = Character::with('characters_images')->findOrFail($id);

        foreach($character->characters_images as $image) {
            UploadHelper::deleteFile($image->image);
        }

        $character->delete();
    }


}
 