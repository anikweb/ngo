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
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Add New Images</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projects.multiple.image.update') }}" enctype="multipart/form-data" id="multiple_image_form" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $project->slug }}">
                            <input type="file" name="images" class="multiple_image d-none" id="multiple_image" multiple="" onchange="image_select()">
                        </form>
                        <div  id="multiple_image_container" class="d-flex justify-content-start">
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <button type="button" class="btn btn-primary text-right" onclick="document.getElementById('multiple_image').click()"><i class="fa fa-file-image"></i> Choose Images</button>
                            <button type="submit" onclick="document.getElementById('multiple_image_form').submit()" class="btn btn-success  upload-btn text-right ml-2"><i class="fa fa-upload"></i> Upload</button>
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
    // multiple Image start
    $('.upload-btn').hide();
    var images = [];
    function image_select(){
        var image = document.getElementById('multiple_image').files;

        if(image.length >= 0){
            $('.upload-btn').show();
        }
        for (i = 0; i < image.length; i++) {
            if(check_duplicate(image[i].name)){
                images.push({
                    'name' : image[i].name,
                    'url' : URL.createObjectURL(image[i]),
                    'file' : image[i],
                });
            }else{
                toastr["error"](image[i].name+" is already added");
            }
        };
        document.getElementById('multiple_image_form').reset();
        document.getElementById('multiple_image_container').innerHTML = image_show();
    }
    function image_show(){
        var image = "";
        images.forEach((i) =>{
            image += ` <div class="image-container bg-light d-flex justify-content-center position-relative">
                        <img src="`+i.url+`" alt="image">
                        <span class="position-absolute" onclick="delete_image(`+images.indexOf(i)+`)">&times;</span>
                    </div>`;
        })
        return image;
    }
    function delete_image(e){
        if(images.length > 1){
            images.splice(e, 1);
            document.getElementById('multiple_image_container').innerHTML = image_show();
        }else{
            images.splice(e, 1);
            document.getElementById('multiple_image_container').innerHTML = image_show();
            $('.upload-btn').hide();
        }
    }
    function check_duplicate(name){
        var image = true;
        if(images.length > 0){
            for(e = 0; e < images.length; e++){
                if(images[e].name == name){
                    image = false;
                    break;
                }
            }
        }
        return image;
    }
    // multiple image end
</script>
@endsection
