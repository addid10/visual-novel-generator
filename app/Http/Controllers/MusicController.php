<?php

namespace App\Http\Controllers;

use App\VisualNovel;
use App\Music;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;

        $musics = VisualNovel::with('musics')->whereId($id)->first(['id']);

        return $request->ajax() ? response()->json(['data' => $musics]) : view('musics.index');
    }
}
