@extends('backend.master')
@section('content')
    <div class="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $role->name }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">{{ $role->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="font-weight-bold">Name</td>
                                        <td>{{ $role->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Permissions</td>
                                        <td>
                                            <ul>
                                                @foreach ($role->permissions as $permission)
                                                    <li>{{ Str::title($permission->name) }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Assigned Users</td>
                                        <td>
                                            <ol>
                                                @foreach ($role->users as $users)
                                                    <li>{{ Str::title($users->name) }} ({{ $users->email }})</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Created </td>
                                        <td>{{ $role->created_at->format('d-M-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Last Update</td>
                                        <td>{{  $role->updated_at->diffForHumans() }}</td>
                                    </tr>

                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
