<?php

namespace App\Http\Controllers;

use App\CharacterImage;
use Illuminate\Http\Request;

class CharacterImageController extends Controller
{
    public function index(Request $request)
    {
        $charactersImages = CharacterImage::get(['id', 'image']);

        return $request->ajax() ? response()->json(['data' => $charactersImages]) : view('characters.index');
    }
        
}
