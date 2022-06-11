@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Publications</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('publications.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">Publications</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($publications as $publication)
                                <div class="col-md-3">
                                    <div class="card card-primary">
                                        <img src="{{ asset('images/media/publications/'.$publication->featured_image) }}" height="250" class="card-img-top" alt="{{ $publication->headline }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $publication->headline }}</h5>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ route('publications.edit',$publication->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a target="_blank" href="{{$publication->url}}" class="btn btn-warning"><i class="fa fa-link"></i></a>
                                            <a href="#" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
        width: 160px;
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
    $('.img_url_copy_btn').popover({
        container: 'body'
    })
    function copyURL(){
        var copyText = document.getElementById("img_url");
         /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

    }
     @if (session('success'))
            toastr.success('{{ session("success") }}','Success')
    @endif
    @if (session('error'))
        toastr.error('{{ session("error") }}','Failed')
    @endif

    $('.delete-btn').click(function(){
        var image_id = $(this).attr('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!, and this image will show missing images where URLs have been used",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire(
                'Deleted!',
                'Image deleted, you can not recover in future.',
                'success'
                )
                setTimeout(function() {
                    $('#trashForm-'+image_id).submit();
                }, 1000);
            }
        })
    });
</script>
@endsection
