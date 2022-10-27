@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terms & Condition</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto my-1">
                <a href="{{ route('terms.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Terms & Condition</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%" class="text-center">#</th>
                                        <th width="20%" class="text-center">Terms</th>
                                        <th width="40%" class="text-center">Description</th>
                                        <th width="10%" class="text-center">Created</th>
                                        <th width="10%" class="text-center">Last Update</th>
                                        <th width="20%" class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($terms as $term)
                                        <tr>
                                            <td>{{ $terms->firstItem() + $loop->index }}</td>
                                            <td>{{ $term->term }}</td>
                                            <td class="text-justify">{{ $term->description }}</td>
                                            <td>{{ $term->created_at->format('d-M-Y, h:i') }}</td>
                                            <td>{{ $term->updated_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('terms.edit',$term->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="javascript:void(0)" data-id="{{ $term->id }}" class="btn btn-danger trash-btn"><i class="fa fa-trash"></i> Delete</a>
                                                <form id="trashForm-{{$term->id}}" action="{{ route('terms.destroy',$term->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-muted text-center">No data to show</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            <div>
                                {{ $terms->links() }}
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
         $('.trash-btn').click(function(){
            var term_id = $(this).attr('data-id');
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
                    'Term has been deleted.',
                    'success'
                    )
                    setTimeout(function() {
                        $('#trashForm-'+term_id).submit();
                    }, 1000);
                }
            })
        });
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
    </script>
@endsection
