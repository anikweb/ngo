@extends('backend.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Role</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Create Role</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Role Name</label>
                                        <input type="text" name="role_name" class="form-control" placeholder="Enter Role Name" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @foreach ($permissions as $permission)
                                            <input name="permission_name[]" value="{{ $permission->name }}" id="permission{{ $permission->id }}" type="checkbox">
                                            <label for="permission{{ $permission->id }}">{{ Str::title($permission->name) }}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
