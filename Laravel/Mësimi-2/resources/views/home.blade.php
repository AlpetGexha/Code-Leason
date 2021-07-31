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
    <form action="{{ route('home') }}" method="POST" >
        @csrf {{-- cross site request forgery - Munedeson krijimin e nje hidde input ne menyre qe te dihet se ne cfare faqe dergoen  te dhenat "Key Value" --}}
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input class="form-check-input" name="basket[]" type="checkbox" value="Kadet" id="flexCheckDefault">
        <label>Kadet</label>
        <input class="form-check-input" name="basket[]" type="checkbox" value="Junior" id="flexCheckDefault">
        <label>Junior</label>
        <input class="form-check-input" name="basket[]" type="checkbox" value="Senior" id="flexCheckDefault">
        <label>Senior</label>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


