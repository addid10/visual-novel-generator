<?php

namespace App\Http\Controllers;

use App\VisualNovel;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = VisualNovel::with('genres')->get();
        
        return view('games.index', ['games' => $games]);
    }
}
