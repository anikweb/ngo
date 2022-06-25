@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Volunteer</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('volunteer.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Volunteer</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Applicant ID</th>
                                        <th>Volunteer ID</th>
                                        <th>E-mail</th>
                                        <th>Mobile</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Thana</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($volunteers as $volunteer)
                                        <tr>
                                            <td>{{$loop->index +1 }}</td>
                                            <td>
                                                <img width="70px" src="{{ asset('images/volunteers/'.$volunteer->image) }}" alt="{{ $volunteer->name_en }}">
                                            </td>
                                            <td>{{ $volunteer->name_en }}</td>
                                            <td>{{ $volunteer->applicant_id }}</td>
                                            <td>
                                                @if (!$volunteer->volunteer_id)
                                                    <span class="badge badge-danger">Volunteer id is not generate yet</span>
                                                @else
                                                {{ $volunteer->volunteer_id }}
                                                @endif
                                            </td>
                                            <td>{{ $volunteer->email }}</td>
                                            <td>{{ $volunteer->mobile }}</td>
                                            <td>{{ $volunteer->preDivision->name }}</td>
                                            <td>{{ $volunteer->preDistrict->name }}</td>
                                            <td>{{ $volunteer->preThana->name }}</td>
                                            <td>
                                                @if ($volunteer->status == 1)
                                                    <span class="badge badge-primary">Applicant</span>
                                                @elseif ($volunteer->status == 2)
                                                    <span class="badge badge-info">Volunteer</span>
                                                @elseif ($volunteer->status == 3)
                                                    <span class="badge badge-danger">Resticted</span>
                                                @elseif ($volunteer->status == 4)
                                                    <span class="badge badge-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ route('volunteer.show',$volunteer->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-info bars-btn" data-id="{{ $volunteer->id }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-bars"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr >
                                            <td colspan="12"><i class="fa fa-exclamation-triangle"></i> No Data Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
                <form id="action_form" action="{{ route('volunteer.update',1) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="volunteer_id" id="volunteer_id">
                            <label for="action">Take Action</label>
                            <select name="action" id="action" class="form-control">
                                <option value="2">Approve volunteer</option>
                                <option value="3">Resticted</option>
                                <option value="4">Decline</option>
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

    $(document).ready( function () {
        $('.table').DataTable();
        $('.bars-btn').click(function() {
            var volunteer_id = $(this).attr('data-id');
            if(volunteer_id){
                $('#volunteer_id').val(volunteer_id);
            }
        });
    } );
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
