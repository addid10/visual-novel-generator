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

    <section class="background" style="background-image: url({{ asset('storages/backgrounds/01.jpg') }})">
        <div class="d-flex justify-content-end">
            <nav class="visual-novel-menu">
                <ul>
                    <li><a href="#">Load Game</a></li>
                    <li><a href="#">Save Game</a></li>
                    <li><a href="{{ route('stories.list') }}">Quit</a></li>
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
@endsection