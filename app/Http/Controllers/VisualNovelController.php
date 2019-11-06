<?php

namespace App\Http\Controllers;

use Auth; 
use App\VisualNovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|unique:visual_novels,title',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
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
                'error' => $th
            ]);
        }

    }
    
    
    public function update(Request $request, $id)
    {
        $visualNovel = VisualNovel::findOrFail($id);

        $visualNovel->update($request->all())
        ->genres()->sync($request->topics);
    }



    public function destroy($id)
    {
        $visualNovel = VisualNovel::findOrFail($id);

        $visualNovel->forceDelete();
    }

}