@extends('layouts.template')

@section('title', 'Backgrounds')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gradient-primary btn-rounded mb-3" id="background-add"
                        data-toggle="modal" data-target="#background-modal">Add</button>
                </div>
                <h4 class="card-title">Backgrounds</h4>
                <div class="table-responsive">
                    <table class="table" id="background-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BG-School</td>
                                <td>
                                    <div class="bg-image-sm">
                                        <img src="{{ asset('bg/01.jpg') }}" alt="image">
                                    </div>
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
@include('modals.backgrounds.add');
@endsection

@section('javascript')
<script src="{{ asset('js/background/background.js') }}"></script>
@endsection