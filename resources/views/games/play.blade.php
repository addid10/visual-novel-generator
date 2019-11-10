@extends('layouts.template_blank')

@section('title', 'Played GSA Visual Novel')

@section('css')
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

    {{-- Asset --}}
    @foreach($games as $game)
        @if(!$game->musics->isEmpty())
            @foreach ($game->musics as $music)
                <audio preload="auto" src="{{ asset('storages/'.$music->music) }}" id="{{ $music->name }}"></audio>
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


    <section class="background" style="background-image: url({{ asset('storages/backgrounds/01.jpg') }})">
        <div class="d-flex justify-content-end">
            <nav class="visual-novel-menu">
                <ul>
                    <li>
                        <form action="{{ route('game.save', ['id' => $id]) }}" method="POST">
                            @csrf
                            <input type="hidden" id="dialogue-number" name="save" value="{{ Request::input('load') }}">
                            <button type="submit" class="btn-normal save-game">Save Game</button>
                        </form>
                    </li>
                    <li><a href="{{ route('game.menu', ['id' => $id]) }}">Quit</a></li>
                </ul>
            </nav>

        </div>

        <div class="character row ml-0 mr-0">
            <div id="" class="col-6 mx-auto">
                <img class="animated fadeIn delay-2s mx-auto character-faceclaim"
                    src="{{ asset('storages/characters/Fendy.png') }}">
            </div>
        </div>
        <div class="row box">
            <div class="virtual-box">
                <div class="character-name">Kagami</div>
                <p class="virtual-text-box">Apa yang kalian lakukan di tempat ini? Bukannya ini termasuk tempat yang
                    berbahaya dikunjungi? Tunggu, tempat ini harusnya terhindar dari media!</p>
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