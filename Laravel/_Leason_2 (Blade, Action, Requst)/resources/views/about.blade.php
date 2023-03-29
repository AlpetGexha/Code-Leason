@extends('layouts.master')

@section('title', "About Us")
prepend
@prepend('scripts')
    <link rel="stylesheet" type="text/css" href="assets/css/about.css">
@endprepend



@section('body')
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">An active item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
    </ul>
@endsection
