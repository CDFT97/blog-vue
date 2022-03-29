@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Create Role</h3>
            </div>

            <div class="card-body">

                @include('admin.partials.error-messages')

                <form method="POST" action="{{ route('admin.roles.store') }}">

                    @include('admin.roles.form')
                    
                    <button class="btn btn-primary btn-block">Create Role</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection