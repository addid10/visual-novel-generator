<?php

namespace App\Http\Controllers;

use App\Story;
use App\VisualNovel;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $stories = VisualNovel::with('user')->get();

        return $request->ajax() ? response()->json(['data' => $stories]) : view('stories.index');
    }
    
    public function show($id)
    {
        $stories = Story::with(['character', 'background', 'music'])
        ->whereVisualNovelId($id)->get();

        return response()->json([
            'data' => $stories
        ]);
    }
}
