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
                <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">{{ $publication->headline }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ asset('images/media/publications/'.$publication->featured_image) }}" alt="{{ $publication->headline }}">
                            </div>
                            <div class="col-md-6">
                                <h3><strong>Headline:</strong> {{ $publication->headline }}</h3>
                                <h6><strong>Slug:</strong> {{ $publication->slug }}</h6>
                                <h4><strong>Media:</strong> {{ $publication->media }}</h4>
                                <h4><strong>Url:</strong><a href="{{ $publication->url }}"> {{ Str::limit($publication->url, 50, '...')  }}</a></h4>
                                @php
                                    $time = strtotime($publication->published_date);
                                @endphp
                                <h6><strong>Published at:</strong> {{ date('d-m-Y',$time) }}</h6>
                                <h6><strong>Created  at:</strong> {{ $publication->created_at->format('d-m-Y') }}</h6>
                            </div>
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
