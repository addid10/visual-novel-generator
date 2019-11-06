@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('title', 'Visual Novels')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gradient-primary btn-rounded mb-3" id="visual-novel-add"
                        data-toggle="modal" data-target="#visual-novel-modal">Add</button>
                </div>
                <h4 class="card-title">Visual Novels</h4>
                <div class="table-responsive">
                        <table class="table" id="visual-novel-table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Creator</th>
                                        <th></th>
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
@include('modals.visual_novels.add');
@include('modals.visual_novels.character');
@include('modals.visual_novels.background');
@include('modals.visual_novels.music');
@endsection

@section('javascript')
{{-- Datatable  --}}
<script type="text/javascript" src="{{ asset('assets/vendors/datatables-bs4/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>

{{-- Custom Javascript --}}
<script src="{{ asset('js/visual_novel/visual_novel.js') }}"></script>
@endsection