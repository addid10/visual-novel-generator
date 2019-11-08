<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $characters = Character::get(['id', 'fullname', 'gender']);

        return $request->ajax() ? response()->json(['data' => $characters]) : view('characters.index');
    }
        
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|unique:characters,fullname',
            ]);

            if($validator->fails()) {
                return response()->json([
                    'error' => "The title has already been taken!"
                ]);
            }

            Character::create([
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
        $character = Character::findOrFail($id);

        return response()->json($character);
    }

    
    public function update(Request $request, $id)
    {
        try {
            $character = Character::findOrFail($id);

            $character->update([
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
        $character = Character::findOrFail($id);

        $character->delete();
    }


}
 