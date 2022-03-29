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
                <form method="POST" action="{{ route('admin.users.update', $user) }}">

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email', $user->email) }}" type="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <span class="help-block">Leave empty to not change the password</span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm password:</label>
                        <input name="password_confirmation" type="password" class="form-control"
                            placeholder="Confirm password">
                    </div>

                    <button class="btn btn-primary btn-block">Update User</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Roles</h3>
            </div>

            <div class="card-body">
                @role('Admin')
                    <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                        @csrf
                        @method('PUT')

                        @include('admin.roles.checkboxes')

                        <button class="btn btn-primary ">Update Roles</button>
                    </form>
                @else
                    @forelse ($user->roles as $role)
                        <li class="list-group-item">{{$role->name}}</li>
                    @empty
                    <li class="list-group-item">You dont have any role</li>
                    @endforelse
                @endrole

            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Permissions</h3>
            </div>

            <div class="card-body">
                @role('Admin')
                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                        @csrf
                        @method('PUT')
                        
                        @include('admin.permissions.checkboxes', ['model' => $user])

                        <button class="btn btn-primary ">Update permisions</button>
                    </form>
                @else
                    @forelse ($user->permissions as $permission)
                        <li class="list-group-item">{{$permission->name}}</li>
                    @empty
                    <li class="list-group-item">You dont have any permission</li>
                    @endforelse
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
