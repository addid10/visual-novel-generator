<?php

namespace App\Http\Controllers;

use App\VisualNovel;
use App\Background;
use App\Helpers\UploadHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BackgroundController extends Controller
{
    public function index(Request $request)
    {
        $backgrounds = Background::get();

        return $request->ajax() ? response()->json(['data' => $backgrounds]) : view('backgrounds.index');
    }
        
    public function specific(Request $request)
    {
        $id = $request->id;

        $backgrounds = VisualNovel::with('backgrounds')->whereId($id)->first(['id']);

        return response()->json([
            'data' => $backgrounds
        ]);
    }

    public function store(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:backgrounds,name',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => "The background has already been taken!"
                ]);
            }
            
            $background = new Background;

            $background->name = $request->name;
            
            
            if ($request->hasFile('image')) {

                $imageName = UploadHelper::uploadImage(
                    $request->file('image'), 
                    $request->name,
                    'backgrounds'
                );

                $background->image = $imageName;
            }
            $background->save();
            $background->visual_novels()->attach($request->visual_novels);

            return response()->json([
                'success' => "Data added successfully!"
            ]);
       
        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Failed data execution!"
            ]);
        }

    }
    
    public function edit($id)
    {
        $background = Background::with('visual_novels')->findOrFail($id);

        return response()->json($background);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $background = Background::findOrFail($id);

            $background->name = $request->name;

            if ($request->hasFile('image')) {
                UploadHelper::deleteFile($background->image);

                $imageName = UploadHelper::uploadImage(
                    $request->file('image'), 
                    $request->name,
                    'backgrounds'
                );

                $background->image = $imageName;
            }

            $background->save();
            $background->visual_novels()->sync($request->visual_novels);
            
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
        $background = Character::findOrFail($id);

        $background->delete();
    }

}
