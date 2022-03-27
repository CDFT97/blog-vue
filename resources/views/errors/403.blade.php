@extends('layout')


@section('content')
    <section class="pages container">
        <div class="page page-about">
            <h1 class="text-capitalize">403 This action is unauthorized</h1>
            <p>Go to <a href="{{route('pages.home')}}">Home</a></p>
        </div>
    </section>  
@endsection