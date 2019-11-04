@extends('layouts.template_blank')

@section('title', 'Menu')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/game.css') }}">
@endsection

@section('content')

<body class="game-menu-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <nav class="game-menu-position">
                    <div class="game-menu">
                        <h1>
                            <a href="#">GSA Visual Novel</a>
                        </h1>
                        <hr>
                        <label class="w-100">New Game</label>
                        <label class="w-100">Load Game</label>
                        <label class="w-100">Quit</label>

                    </div>
                </nav>

            </div>
        </div>
    </div>
    @endsection