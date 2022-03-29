@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
            </div>

            <div class="card-body">
                @include('admin.partials.error-messages')
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group d-inline" >
                                <h4>Roles</h4>
                                @include('admin.roles.checkboxes')
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group d-inline" >
                                <h4>Permissions</h4>
                                @include('admin.permissions.checkboxes', ['model' => $user])
                            </div>
                        </div>
                    </div>
                

                    <span class="help-block d-block">The password will be generated and sent by mail</span>

                    <button class="btn btn-primary btn-block">Create User</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection