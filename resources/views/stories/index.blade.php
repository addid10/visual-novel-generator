@extends('layouts.template')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('title', 'Visual Novels Stories')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Visual Novels Stories</h4>
                <div class="table-responsive">
                    <table class="table" id="stories-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Creator</th>
                                <th>Action</th>
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
    @include('modals.stories.stories');
@endsection

@section('javascript')
{{-- Datatable  --}}
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables-bs4/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

{{-- Custom Javascript --}}
    <script src="{{ asset('js/stories/stories.js') }}"></script>
@endsection

{{-- 
<tr>
    <td>GSA Visual Novel</td>
    <td>Rerezditya</td>
    <td>
        <button type="button" class="btn btn-md btn-gradient-primary w-100" data-toggle="modal"
            data-target="#stories-modal">Stories</button>
    </td>
</tr> --}}