@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
        <li class="breadcrumb-item active" aria-current="page">Multiple Images</li>
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
                        <form action="{{ route('projects.multiple.image.update') }}" enctype="multipart/form-data" id="form" method="POST">
                            @csrf
                            <label for="" class="multiple_image_label"></label>
                            <input type="hidden" name="project_slug" value="{{ $project->slug }}">
                            <input type="file" name="gallery[]" class="multiple_image" id="multiple_image" multiple="" onchange="image_select()">
                            <button type="submit"class="btn btn-success  upload-btn text-right ml-2"><i class="fa fa-upload"></i> Upload</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">Image Gallery</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        {{-- <th>Size</th> --}}
                                        <th>Uploaded at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->imageGallery as $key => $imageGallery)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img width="300" src="{{ asset('images/projects/image_gallery/'.$project->slug.'/'.$imageGallery->image) }}" alt="{{ $project->title }}"></td>
                                            {{-- <td>@php var_dump(filesize(public_path('images/projects/image_gallery/'.$project->slug.'/'.$imageGallery->image))) @endphp</td> --}}
                                            <td>{{ $imageGallery->created_at->format('d-M-y, h:i A') }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                                                <a href="#" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
        var image = document.getElementById('multiple_image').files;

        if(image.length >= 0){
            $('.upload-btn').show();
        }else{
            $('.upload-btn').hide();

        }
    }
</script>
@endsection
