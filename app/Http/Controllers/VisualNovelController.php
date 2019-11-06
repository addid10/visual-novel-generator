<?php

namespace App\Http\Controllers;

use App\VisualNovel;
use Illuminate\Http\Request;

class VisualNovelController extends Controller
{
    public function index()
    {

        return view('visual_novels.index');
    
    }

    public function toJson()
    {
        $visual_novels = VisualNovel::with('user')->get();

        return response()->json([
            'data' => $visual_novels
        ]);
    }

}
