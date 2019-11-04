@extends('layouts.template')

@section('title', 'Stories')

@section('content')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-book-open-variant mdi-24px float-right"></i>
                </h4>
                <h6 class="card-text">Drama, Action, Increased by 60%</h6>
            </div>
        </div>
    </div>
</div>

@endsection
