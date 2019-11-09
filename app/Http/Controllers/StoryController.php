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
        $stories = Story::with(['character_image', 'background', 'music'])
        ->whereVisualNovelId($id)->get();

        return response()->json([
            'data' => $stories
        ]);
    }

    public function store(Request $request)
    {
        Story::create([
            'dialogue_number' => $request->dialogue_number,
            'dialogue' => $request->dialogue,
            'visual_novel_id' => $request->visual_novel_id,
            'character_image_id' => $request->character_id,
            'background_id' => $request->background_id,
            'music_id' => $request->music_id
        ]);
            
        return response()->json([
            'success' => "Data added successfully!"
        ]);
    }

    public function edit($id)
    {
        $stories = Story::findOrFail($id);
            
        return response()->json([
            'data' => $stories
        ]);
    }
}
