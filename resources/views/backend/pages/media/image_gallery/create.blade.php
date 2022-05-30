@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('image-gallery.index') }}">Image Gallery</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New</li>
        </ol>
    </nav>

    <div class="content">
        <div class="row">
            @if (session('validation_error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('validation_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Add New Images (Max Size to upload 10MB)</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('image-gallery.store') }}" enctype="multipart/form-data" id="form" method="POST">
                            @csrf
                            <input type="file" name="images[]" class="images" id="images" multiple="multiple" onchange="image_select()">
                            <button type="submit"class="btn btn-success  upload-btn text-right ml-2"><i class="fa fa-upload"></i> Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('internal_css')
    <style>
        .image-container{
            height: 120px;
            width: 200px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
        }
        .image-container img{
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .image-container span{
            top: -6px;
            right: 8px;
            color: red;
            font-size: 28px;
            font-weight: normal;
            cursor: pointer;
        }
    </style>
@endsection
@section('footer_js')
<script>
    @if(session('success'))
        toastr["success"]("{{ session('success') }}")
    @elseif(session('error'))
        toastr["error"]("{{ session('error') }}")
    @endif

    @if(session('validation_error'))
        toastr["error"]("{{ session('validation_error') }}")
    @endif

    $('.upload-btn').hide();
    var images = [];
    function image_select(){
        var image = document.getElementById('images').files;
        if(image.length >= 0){
            $('.upload-btn').show();
        }else{
            $('.upload-btn').hide();

        }
    }
</script>
@endsection
