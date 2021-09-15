@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assign User</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Assign User</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.assign.users.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="user_id" id="user" class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="">-Select-</option>
                                        @foreach ($users as $user)
                                            <option value={{$user->id}}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <select name="role_name" id="role" class="form-control @error('role_name') is-invalid @enderror">
                                        <option value="">-Select-</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_name')
                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Assign</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Since</td>
                                        <td>Roles</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $users->firstItem() +$loop->index }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('d-M-Y')}}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                <p>{{ $role->name }}</p>
                                                @endforeach
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_js')
<script>
    @if (session('success'))
        toastr['success']("{{ session('success') }}");
    @endif
</script>
@endsection
