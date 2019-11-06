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
                        <label class="w-100"><a class="d-block" href="{{ route('game.index') }}">New Game</a></label>
                        <label class="w-100"><a class="d-block" href="{{ route('game.index') }}">Load Game</a></label>
                        <label class="w-100"><a class="d-block" href="{{ route('game.index') }}">Quit</a></label>
                        {{ var_dump($menu) }}
                    </div>
                </nav>

            </div>
        </div>
    </div>
    @endsection