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
                                            <td>{{ $volunteers->firstItem() +$loop->index }}</td>
                                            <td>
                                                <img width="70px" src="{{ asset('images/volunteers/'.$volunteer->image) }}" alt="{{ $volunteer->name_en }}">
                                            </td>
                                            <td>{{ $volunteer->name_en }}</td>
                                            <td>{{ $volunteer->applicant_id }}</td>
                                            <td>
                                                @if (!$volunteer->volunteer_id)
                                                    <span class="badge badge-danger">Volunteer id is not generate yet</span>
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
                                                    <span class="badge badge-primary">Volunteer</span>
                                                @elseif ($volunteer->status == 3)
                                                    <span class="badge badge-danger">Resticted</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ route('volunteer.show',$volunteer->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-info"><i class="fa fa-bars"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr colspan="12"><i class="fa fa-exclamation-triangle"></i> No Data Found!</tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $volunteers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal  --}}
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
