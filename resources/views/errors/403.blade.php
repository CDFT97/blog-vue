@extends('layout')


@section('content')
    <section class="pages container">
        <div class="page page-about">
            <h1 class="text-capitalize">403 This action is unauthorized</h1>
            <h3 style="color:red!important;">{{ $exception->getMessage() }}</h3>
            <p>Go to <a href="{{ url()->previous() }}">Back</a></p>
        </div>
    </section>  
@endsection