@extends('layouts.template')

@section('title', 'Characters')

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
                                <th>Image</th>
                                <th>Creator</th>
                                <th colspan="3">Assets</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GSA Visual Novel</td>
                                <td>
                                    <div class="nav-profile-img">
                                        <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                                    </div>
                                </td>
                                <td>Rerezditya</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-gradient-warning"
                                        id="visualNovelAdd">Update</button>
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
@include('modals.visual_novels.add');
@endsection

@section('javascript')
<script src="{{ asset('js/visual_novel/visual_novel.js') }}"></script>
@endsection