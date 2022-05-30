@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('image-gallery.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">Image Gallery</div>
                    <div class="card-body">
                        @foreach ($imageGalleries as $imageGallery)
                            <a href="#">
                                <div class="image_container">
                                    <img src="{{ asset('images/media/image_gallery/'.$imageGallery->image) }}" class="img-fluid" alt="{{ $imageGallery->alt_text }}">
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="ml-4">
                        {{ $imageGalleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('internal_css')
<style>
    .image_container{
        float: left;
        overflow: hidden;
        width: 150px;
        height: 150px;
        margin: 5px;
    }
    .image_container img{
       width: 100%;
       height: 100%;
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
