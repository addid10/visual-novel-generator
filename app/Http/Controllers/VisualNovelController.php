<?php

namespace App\Http\Controllers;

use Auth; 
use App\VisualNovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisualNovelController extends Controller
{
    public function index(Request $request)
    {
        $visualNovel = VisualNovel::with('user')->get();

        return $request->ajax() ? response()->json(['data' => $visualNovel]) : view('visual_novels.index');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|unique:visual_novels,title',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => "The title has already been taken!"
                ]);
            }

            VisualNovel::create([
                'title' => $request->title,
                'user_id' => Auth::user()->id,
                'synopsis' => $request->synopsis

            ])
            ->genres()->attach($request->genres);
            
            return response()->json([
                'success' => "Data added successfully!"
            ]);
       
        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Failed data execution!"
            ]);
        }

    }
    
    public function edit($id)
    {
        $visualNovel = VisualNovel::with('genres')->findOrFail($id);

        return response()->json($visualNovel);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $visualNovel = VisualNovel::findOrFail($id);

            $visualNovel->update([
                'title' => $request->title,
                'synopsis' => $request->synopsis
            ]);
            
            $visualNovel->genres()->sync($request->genres);
            
            return response()->json([
                'success' => "Data updated successfully!"
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => "Failed data execution!",
                'message' => $th
            ]);
        }
    }


    public function destroy($id)
    {
        $visualNovel = VisualNovel::findOrFail($id);

        $visualNovel->delete();
        $visualNovel->genres()->detach();
    }

    public function backgrounds($id)
    {
        $visualNovelBackgrounds = VisualNovel::with('backgrounds')
        ->findOrFail($id);

        return response()->json([
            'data' => $visualNovelBackgrounds
        ]);
    }

    public function musics($id)
    {
        $visualNovelMusics = VisualNovel::with('musics')
        ->findOrFail($id);

        return response()->json([
            'data' => $visualNovelMusics
        ]);
    }

}