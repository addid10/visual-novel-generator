@extends('layouts.template')

@section('title', 'Visual Novels')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Visual Novels</h4>
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
                            <tr>
                                <td>GSA Visual Novel</td>
                                <td>Rerezditya</td>
                                <td>
                                    <button type="button" class="btn btn-md btn-gradient-primary w-100" data-toggle="modal"
                                        data-target="#stories-modal">Stories</button>
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
    @include('modals.stories.stories');
@endsection

@section('javascript')
    <script src="{{ asset('js/stories/stories.js') }}"></script>
@endsection
