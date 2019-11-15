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
}
