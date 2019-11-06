@extends('layouts.template')

@section('title', 'Stories')

@section('content')
<div class="row">
    @foreach($games as $game)
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body p-4">
                <h4 class="font-weight-normal mb-3"> {{ $game->title }} <i class="mdi mdi-book-open-variant mdi-24px float-right"></i>
                </h4>
                <small class="card-text">
                    @foreach($game->genres as $genre)
                        {{ $genre->name }}, 
                    @endforeach
                </small>
                <a href="{{ route('game.menu', ['id' => $game->id]) }}" class="mt-3 btn btn-rounded btn-block btn-gradient-primary btn-lg font-weight-medium">Play</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
