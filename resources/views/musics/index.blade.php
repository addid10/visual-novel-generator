@extends('layouts.template')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('title', 'Musics')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gradient-primary btn-rounded mb-3" id="music-add"
                        data-toggle="modal" data-target="#music-modal">Add</button>
                </div>
                <h4 class="card-title">Musics</h4>
                <div class="table-responsive">
                    <table class="table" id="music-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Music</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
@include('modals.musics.add');
@endsection

@section('javascript')
{{-- Datatable  --}}
<script type="text/javascript" src="{{ asset('assets/vendors/datatables-bs4/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap/bootstrap-select.js') }}"></script>

{{-- Custom JS --}}
<script src="{{ asset('js/music/music.js') }}"></script>
@endsection