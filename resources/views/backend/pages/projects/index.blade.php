@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Projects</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create new</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Projects</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="17%">Featured Image</th>
                                        <th width="10%">Title</th>
                                        <th width="30%">Description</th>
                                        <th width="5%">Created at</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($projects as $project)
                                        <tr>
                                            <td>{{ $projects->firstItem() + $loop->index }}</td>
                                            @if ($project->featured_image)
                                                <td><img class="rounded" style="width: 250px" src="{{ asset('images/projects/'.$project->featured_image) }}" alt="{{ $project->title }}"></td>
                                            @else
                                                <td><img class="rounded" style="width: 250px" src="{{ asset('images/placeholder/image.jpg') }}" alt="{{ $project->title }}"></td>
                                            @endif
                                            <td>{{ $project->title }}</td>
                                            <td>@php echo Str::limit($project->description, 50, '....') @endphp @if(Str::length($project->description) >50) <a href="{{route('projects.show',$project->id)}}">More</a> @endif</td>
                                            <td>{{ $project->created_at->format('d-m-y, h:i A') }}</td>
                                            <td>
                                                <a href="{{route('projects.show',$project->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('projects.multiple.image.create',$project->slug) }}" class="btn btn-primary"><i class="fa fa-images"></i></a>
                                                <button data-id="{{ $project->id }}" class="btn btn-danger trash-btn"><i class="fa fa-trash"></i></button>
                                                <form id="trashForm-{{ $project->id }}" action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"><i class="fa fa-exclamation-circle"></i> No data to show</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $projects->links() }}
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
        var project_id = $(this).attr('data-id');
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
                    $('#trashForm-'+project_id).submit();
                }, 1000);
            }
        })
    });
</script>
@endsection
