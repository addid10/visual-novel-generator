<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterImageController extends Controller
{
    public function index(Request $request)
    {
        //TODO FIX IT AAAA FIX DATABASE
        $id = $request->id;

        $charactersImages = DB::table('visual_novels_characters')
        ->join('characters', 'visual_novels_characters.character_id', '=', 'characters.id')
        ->join('characters_images', 'characters.id', '=', 'characters_images.character_id')
        ->where('visual_novels_characters.visual_novel_id', '=', $id)
        ->get(['characters_images.id', 'characters_images.image']);

        return $request->ajax() ? response()->json($charactersImages) : view('characters.index');
    }
        
}
