<?php

namespace App\Http\Controllers;

use App\VisualNovelCharacter;
use Illuminate\Http\Request;

class VisualNovelCharacterController extends Controller
{
    public function show($id)
    {
        $characterVisualNovel = VisualNovelCharacter::with(['visual_novel', 'character' => function($query){
            $query->with('characters_images');
        }, 'character_role'])
        ->whereVisualNovelId($id)->get();

        return response()->json([
            'data' => $characterVisualNovel
        ]);
    }
}
