<?php

namespace App\Http\Controllers;

use App\VisualNovel;
use App\VisualNovelCharacter;
use App\Helpers\VisualNovelHelper;

use Illuminate\Http\Request;

class VisualNovelCharacterController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validator = VisualNovelHelper::checkCharacter($request->visual_novel_id, $request->character_id);

            if($validator) {
                VisualNovelCharacter::create([
                    'visual_novel_id' => $request->visual_novel_id,
                    'character_id' => $request->character_id,
                    'character_role_id' => $request->character_role_id
                ]);
                
                return response()->json([
                    'success' => "Data added successfully!"
                ]);

            } else {
                
                return response()->json([
                    'error' => "The character has already been taken!"
                ]);
            }
       
        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Failed data execution!"
            ]);
        }

    }
    
    public function show($id)
    {
        $visualNovelCharacters = VisualNovelCharacter::with(['visual_novel', 'character' => function($query){
            $query->with('characters_images');
        }, 'character_role'])
        ->whereVisualNovelId($id)->get();

        return response()->json([
            'data' => $visualNovelCharacters
        ]);
    }

    public function destroy($id)
    {
        $visualNovelCharacters = VisualNovelCharacter::findOrFail($id);

        $visualNovelCharacters->delete();
    }

    public function iseng(){
        
        $visualNovelBackground = VisualNovel::with('backgrounds')
        ->get();

        dd($visualNovelBackground);
        if ($visualNovelBackground === 0){
            return "T";
        } else {
            return "F";
        }
    }
}
