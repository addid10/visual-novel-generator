<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::get(['id', 'name']);
        
        return response()->json([
            'data' => $genres
        ]);
    
    }
}
