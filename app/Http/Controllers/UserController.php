<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $creators = User::get(['id', 'name']);

        // return response()->json([
        //     'data' => $creators
        // ]);
    }

}
