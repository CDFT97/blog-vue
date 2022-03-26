@extends('layout')


@section('content')
    <section class="pages container">
        <div class="page page-about">
            <h1 class="text-capitalize">404 Page not found</h1>
            <p>Go to <a href="{{route('pages.home')}}">Home</a></p>
        </div>
    </section>  
@endsection