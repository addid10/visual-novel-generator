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
                            {{ $title }}
                        </h1>
                        <hr>
                        <label class="w-100"><a class="d-block" href="{{ route('game.play', ['id' => $id]) }}">New Game</a></label>
                        <label class="w-100"><a class="d-block" href="{{ route('game.play', ['id' => $id, 'load' => $loadData]) }}">Load Game</a></label>
                        <label class="w-100"><a class="d-block" href="{{ route('game.index') }}">Quit</a></label>
                    </div>
                </nav>

            </div>
        </div>
    </div>
</body>
@endsection