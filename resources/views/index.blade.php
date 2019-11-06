@extends('layouts.template')

@section('title', 'Dashboard')


@section('content')
<div class="row" id="proBanner">
    <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
            <p>You have logged in as an </p>
                <a
                    class="btn purchase-button ml-2">{{ Auth::user()->role->name }} </a>
        </span>
    </div>
</div>
@endsection
