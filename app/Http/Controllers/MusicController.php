<?php

namespace App\Http\Controllers;

use App\VisualNovel;
use App\Music;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Request $request)
    {
        $musics = Music::get();

        return $request->ajax() ? response()->json(['data' => $musics]) : view('musics.index');
    }

    public function specific(Request $request)
    {
        $id = $request->id;

        $musics = VisualNovel::with('musics')->whereId($id)->first(['id']);

        return response()->json([
            'data' => $musics
        ]);
    }

    public function store(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:musics,name',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => "The music has already been taken!"
                ]);
            }
            
            $music = new Music;

            $music->name = $request->name;
            
            
            if ($request->hasFile('music')) {

                $audioName = UploadHelper::uploadFile(
                    $request->file('music'), 
                    $request->name,
                    'musics'
                );

                $music->music = $audioName;
            }
            $music->save();
            $music->visual_novels()->attach($request->visual_novels);

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
        $music = Music::with('visual_novels')->findOrFail($id);

        return response()->json($music);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $music = Music::findOrFail($id);

            $music->name = $request->name;

            if ($request->hasFile('music')) {
                UploadHelper::deleteFile($music->music);

                $audioName = UploadHelper::uploadFile(
                    $request->file('music'), 
                    $request->name,
                    'musics'
                );

                $music->music = $audioName;
            }

            $music->save();
            $music->visual_novels()->sync($request->visual_novels);
            
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
        $music = Music::findOrFail($id);
        
        UploadHelper::deleteFile($music->music);

        $music->delete();
        $music->visual_novels()->detach();
    }
}
