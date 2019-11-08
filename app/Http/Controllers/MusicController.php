<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Request $request)
    {
        $musics = Music::get(['id', 'name', 'music']);

        return $request->ajax() ? response()->json(['data' => $musics]) : view('musics.index');
    }
}
