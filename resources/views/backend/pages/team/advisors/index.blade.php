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
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($advisors as $advisor)
                                        <tr>
                                            <td>{{ $advisors->firstItem() + $loop->index }}</td>
                                            @if ($advisor->image)
                                                <td><img class="rounded" style="width: 150px" src="{{ asset('images/advisors/'.$advisor->image) }}" alt="{{ $advisor->name }}"></td>
                                            @else
                                                <td><img class="rounded" style="width: 150px" src="{{ asset('images/placeholder/image.jpg') }}" alt=""></td>
                                            @endif
                                            <td>{{ $advisor->name }}</td>
                                            <td>{{ $advisor->designation }}</td>
                                            <td><a href="mailto:{{ $advisor->email }}">{{ $advisor->email }}</a></td>
                                            <td class="text-left">
                                                <ul style="list-style: none">
                                                    @foreach ($advisor->advisorSocial as $item)
                                                    <li> <i class="{{ $item->platform->icon }}"></i> {{ $item->platform->name.'/'.$item->username }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="priority-td"><button class="btn priority-btn" data-id="{{ $advisor->priority }}" data-priority="{{ $advisor->id }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button> {{ $advisor->priority }}</td>
                                            <td>
                                                <a href="{{route('advisors-settings.edit',$advisor->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <button data-id="{{ $advisor->id }}" class="btn btn-danger trash-btn"><i class="fa fa-trash"></i></button>
                                                <form id="trashForm-{{ $advisor->id }}" action="{{ route('advisors-settings.destroy',$advisor->id) }}" method="POST">
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
                                {{ $advisors->links() }}
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
                <form action="{{ route('advisor.change.priority') }}" method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="advisor_id" id="advisor_id">
                            <label for="priority">priority</label>
                            <select name="priority" id="priority" class="form-control">
                                @foreach ($advisors_priority as $advisor)
                                    <option value="{{$advisor->priority}}">{{$advisor->priority}}</option>
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
    $('.priority-btn').click(function(){
        var advisor_id = $(this).attr('data-priority');
        var advisor_priority = $(this).attr('data-id');
        // alert(advisor_priority);
        $('#advisor_id').val(advisor_id);
        $('#priority').val(advisor_priority);
    });
</script>
@endsection
