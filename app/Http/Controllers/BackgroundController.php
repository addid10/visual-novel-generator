<?php

namespace App\Http\Controllers;

use App\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function index(Request $request)
    {
        $backgrounds = Background::get(['id', 'name', 'image']);

        return $request->ajax() ? response()->json(['data' => $backgrounds]) : view('backgrounds.index');
    }
        
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|unique:backgrounds,name',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => "The title has already been taken!"
                ]);
            }

            Background::create([
                'fullname' => $request->title,
                'nickname' => $request->synopsis,
                'synopsis' => $request->synopsis,
                'gender' => $request->synopsis,
                'description' => $request->synopsis
            ]);
            
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
        $background = Background::findOrFail($id);

        return response()->json($background);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $background = Background::findOrFail($id);

            $background->update([
                'fullname' => $request->title,
                'nickname' => $request->synopsis,
                'synopsis' => $request->synopsis,
                'gender' => $request->synopsis,
                'description' => $request->synopsis
            ]);
            
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
        $background = Character::findOrFail($id);

        $background->delete();
    }

}
