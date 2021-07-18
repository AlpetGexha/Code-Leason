@extends('layouts.master')

@section('title', "Home Page")

{{--
@section('style')
    @parent //nese deshirojm ti thirrim stylaj qe jane
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
@endsection

--}}
<div class="alert alert-danger">
    {!! $slot= "ez" !!}
</div>

@push('scripts')
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
@endpush

@section('body')
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('item.sitebar')
        </div>
    </div>


@endsection


