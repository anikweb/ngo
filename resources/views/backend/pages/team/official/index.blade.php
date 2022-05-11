@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Official Team</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('official-team.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create new</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Official Team</h3>
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
                                    @forelse ($official_teams as $official_team)
                                        <tr>
                                            <td>{{ $official_teams->firstItem() + $loop->index }}</td>
                                            @if ($official_team->image)
                                                <td><img class="rounded" style="width: 150px" src="{{ asset('images/official_team/'.$official_team->image) }}" alt="{{ $official_team->name }}"></td>
                                            @else
                                                <td><img class="rounded" style="width: 150px" src="{{ asset('images/placeholder/image.jpg') }}" alt=""></td>
                                            @endif
                                            <td>{{ $official_team->name }}</td>
                                            <td>{{ $official_team->designation }}</td>
                                            <td><a href="mailto:{{ $official_team->email }}">{{ $official_team->email }}</a></td>
                                            <td class="text-left">
                                                <ul style="list-style: none">
                                                    @foreach ($official_team->officialTeamSocial as $item)
                                                    <li> <i class="{{ $item->platform->icon }}"></i> {{ $item->platform->name.'/'.$item->username }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="priority-td"><button class="btn priority-btn" data-id="{{ $official_team->priority }}" data-priority="{{ $official_team->id }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button> {{ $official_team->priority }}</td>
                                            <td>
                                                <a href="{{route('official-team.edit',$official_team->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <button data-id="{{ $official_team->id }}" class="btn btn-danger trash-btn"><i class="fa fa-trash"></i></button>
                                                <form id="trashForm-{{ $official_team->id }}" action="{{ route('official-team.destroy',$official_team->id) }}" method="POST">
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
                                {{ $official_teams->links() }}
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
                <form action="{{ route('official.team.change.priority') }}" method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="official_team_id" id="official_team_id">
                            <label for="priority">priority</label>
                            <select name="priority" id="priority" class="form-control">
                                @foreach ($officialTeam_priority as $officialTeam)
                                    <option value="{{$officialTeam->priority}}">{{$officialTeam->priority}}</option>
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
        var officialTeam_id = $(this).attr('data-id');
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
                    $('#trashForm-'+officialTeam_id).submit();
                }, 1000);
            }
        })
    });
    $('.priority-btn').click(function(){
        var officialTeam_id = $(this).attr('data-priority');
        var officialTeam_priority = $(this).attr('data-id');
        // alert(advisor_priority);
        $('#official_team_id').val(officialTeam_id);
        $('#priority').val(officialTeam_priority);

    });
</script>
@endsection
