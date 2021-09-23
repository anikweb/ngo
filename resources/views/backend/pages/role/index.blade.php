@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Roles</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Role Name</th>
                                        <th class="text-center">Created</th>
                                        <th class="text-center">Last Update</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $roles->firstItem() + $loop->index }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at->format('d-M-Y, h:i') }}</td>
                                            <td>{{ $role->updated_at->diffForHumans() }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('role.show',$role->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> Details</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-muted">No data to show</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            <div>
                                {{ $roles->links() }}
                            </div>
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
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
    </script>
@endsection
