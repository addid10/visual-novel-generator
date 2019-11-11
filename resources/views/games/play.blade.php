@extends('layouts.template_blank')

@section('title', 'Playing '.$title)

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/game.css') }}">
@endsection

@section('content')

<body>
    <div class="loader-position">
        <div class="loader loader-circle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="menu-position">
        <div>
            <label class="w-100">
                <span href="#" class="d-block" id="start-game">
                    <i class="mdi mdi-play-circle"></i> Start Game
                </span>
            </label>
        </div>
    </div>

    {{-- Asset --}}
    @foreach($games as $game)
    @if(!$game->musics->isEmpty())
    @foreach ($game->musics as $music)
    <audio preload="auto" src="{{ asset('storages/'.$music->music) }}" id="{{ $music->name }}" loop></audio>
    @endforeach
    @foreach ($game->backgrounds as $background)
    <img src="{{ asset('storages/'.$background->image) }}" alt="" srcset="" class="d-none">
    @endforeach
    @endif
    @endforeach
    @foreach($charactersImages as $characterImage)
    <img src="{{ asset('storages/'.$characterImage->image) }}" alt="" srcset="" class="d-none">
    @endforeach
    {{-- Asset End --}}
    <section class="save">
        <div class="d-flex justify-content-end">
            <nav class="visual-novel-menu">
                <ul>
                    <li>
                        <form id="save-form" action="{{ route('game.save', ['id' => $id]) }}" method="POST">
                            @csrf
                            <input type="hidden" id="dialogue-number"
                                value="{{ Request::input('load') ? Request::input('load') : '1' }}">
                            <input type="hidden" id="story-id" name="id">
                            <button type="submit" class="btn-normal save-game">Save Game</button>
                        </form>
                    </li>
                    <li><a href="{{ route('game.menu', ['id' => $id]) }}">Quit</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="background">
        <div class="character row ml-0 mr-0">
            <div id="character-faceclaim" class="col-6 mx-auto">
            </div>
        </div>
        <div class="row box">
            <div class="virtual-box">
                <div class="character-name" id="character-name"> . . .
                </div>
                <div class="virtual-text-box" id="dialogue">
                </div>
                <button class="arrow"></button>
            </div>
        </div>
    </section>
</body>
@endsection

@section('javascript')
<script src="{{ asset('js/loader.js') }}"></script>
<script src="{{ asset('js/game/game.js') }}"></script>
@endsection