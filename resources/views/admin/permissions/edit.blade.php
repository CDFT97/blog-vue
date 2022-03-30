@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Update Permission</h3>
            </div>

            <div class="card-body">

                @include('admin.partials.error-messages')

                <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="display_name">Identifies:</label>
                        <input  value="{{ old('name', $permission->name) }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="display_name">Name:</label>
                        <input name="display_name" value="{{ old('display_name', $permission->display_name) }}" type="text" class="form-control">
                    </div>

                    <button class="btn btn-primary btn-block">Update Permission</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection