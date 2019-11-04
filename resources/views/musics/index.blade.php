@extends('layouts.template')

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
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>School-OST</td>
                                <td>
                                    <button class="btn btn-icon btn-gradient-danger btn-rounded"><span
                                            class="mdi mdi-play-circle"></span></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-gradient-warning update">
                                        Update</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-gradient-danger delete">
                                        Delete</button>
                                </td>
                            </tr>
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
<script src="{{ asset('js/music/music.js') }}"></script>
@endsection