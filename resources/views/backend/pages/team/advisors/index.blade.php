@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Advisors</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('advisors-settings.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create new</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Advisors</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Social Links</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ($advisors as $advisor)
                                            <tr>
                                                <td>{{ $advisors->firstItem() + $loop->index }}</td>
                                                @if ($advisor->image)
                                                    <td><img class="rounded" style="width: 150px" src="{{ asset('images/advisors/'.$advisor->image) }}" alt="{{ $advisor->name }}"></td>
                                                @else
                                                    <td><img class="rounded" style="width: 150px" src="{{ asset('images/placeholder/image.jpg') }}" alt=""></td>
                                                @endif
                                                <td>{{ $advisor->name }}</td>
                                                <td>{{ $advisor->designation }}</td>
                                                <td>{{ $advisor->email }}</td>
                                                <td>Social Links</td>
                                                <td>
                                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <button data-id="{{ $advisor->id }}" class="btn btn-danger trash-btn"><i class="fa fa-trash"></i></button>
                                                    <form id="trashForm-{{ $advisor->id }}" action="{{ route('advisors-settings.destroy',$advisor->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $advisors->links() }}
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
            toastr.success('{{ session("success") }}','Success')
    @endif
    @if (session('error'))
        toastr.error('{{ session("error") }}','Failed')
    @endif
    $('.trash-btn').click(function(){
        var advisor_id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire(
                'Deleted!',
                'Advisor has been deleted.',
                'success'
                )
                setTimeout(function() {
                    $('#trashForm-'+advisor_id).submit();
                }, 1000);
            }
        })
    });
</script>
@endsection
