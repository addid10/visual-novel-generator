@extends('layouts.template')

@section('title', 'Characters')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gradient-primary btn-rounded mb-3" id="character-add"
                        data-toggle="modal" data-target="#character-modal">Add</button>
                </div>
                <h4 class="card-title">Characters</h4>
                <div class="table-responsive">
                    <table class="table" id="character-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Sex</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fendy</td>
                                <td>
                                    <div class="nav-profile-img">
                                        <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                                    </div>
                                </td>
                                <td>Male</td>
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
@include('modals.characters.add');
@endsection

@section('javascript')
<script src="{{ asset('js/character/character.js') }}"></script>
@endsection