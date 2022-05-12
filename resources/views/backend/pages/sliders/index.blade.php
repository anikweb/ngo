@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sliders</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('sliders.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create new</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sliders</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Button Name</th>
                                        <th>Button Link</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $slider)
                                        <tr>
                                            <td>{{ $sliders->firstItem() + $loop->index }}</td>
                                            @if ($slider->image)
                                                <td><img class="rounded" style="width: 150px" src="{{ asset('images/sliders/'.$slider->image) }}" alt="{{ $slider->title }}"></td>
                                            @else
                                                <td><img class="rounded" style="width: 150px" src="{{ asset('images/placeholder/image.jpg') }}" alt="{{ $slider->title }}"></td>
                                            @endif
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle }}</td>
                                            <td>{{ $slider->button_name }}</td>
                                            <td>{{ $slider->button_link  }}</td>
                                            <td class="priority-td"><button class="btn priority-btn" data-id="{{ $slider->priority }}" data-priority="{{ $slider->id }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button> {{ $slider->priority }}</td>
                                            <td>
                                                <a href="{{route('sliders.show',$slider->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <button data-id="{{ $slider->id }}" class="btn btn-danger trash-btn"><i class="fa fa-trash"></i></button>
                                                <form id="trashForm-{{ $slider->id }}" action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"><i class="fa fa-exclamation-circle"></i> No data to show</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $sliders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('slider.change.priority') }}" method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="slider_id" id="slider_id">
                            <label for="priority">priority</label>
                            <select name="priority" id="priority" class="form-control">
                                @foreach ($sliders_priority as $slider_priority)
                                    <option value="{{$slider_priority->priority}}">{{$slider_priority->priority}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('internal_css')
<style>
    .priority-btn{
        display: none;
    }
    .priority-td:hover .priority-btn{
        display: inline-block;
    }
</style>
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
        var slider_id = $(this).attr('data-id');
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
                    $('#trashForm-'+slider_id).submit();
                }, 1000);
            }
        })
    });
    $('.priority-btn').click(function(){
        var slider_id = $(this).attr('data-priority');
        var slider_priority = $(this).attr('data-id');
        // alert(advisor_priority);
        $('#slider_id').val(slider_id);
        $('#priority').val(slider_priority);

    });
</script>
@endsection
