<?php

namespace App\Http\Controllers;

use Auth;
use App\VisualNovel;
use App\SaveData;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index()
    {
        $games = VisualNovel::with('genres')->get();
        
        return view('games.index', ['games' => $games]);
    }

    public function menu($id)
    {        
        $userId = Auth::user()->id;
        
        $menu = SaveData::with(['story' => function($story){
            $story->whereVisualNovelId($id);
        }])
        ->find($userId);


        return view('games.menu', ['menu' => $menu]);
    }
}
