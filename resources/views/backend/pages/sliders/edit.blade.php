@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Slider</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Slider</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sliders.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-6">
                                    <img style="width:800px; height:460px;" id="image_preview" class="img-fluid d-block @error('image') border border-danger @enderror" src="{{ asset('images/sliders/'.$slider->image) }}" alt="{{ $slider->title }}">
                                    <label for="img" class="btn btn-primary mt-2 "><i class="fa fa-file-image"></i> Choose Image </label>
                                    <input type="file" name="image" style="display: none" id="img" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                    @error('image')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" value="{{ $slider->title }}" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title">
                                                @error('title')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="subtitle">Subtitle <span class="text-danger">*</span></label>
                                                <input type="text" name="subtitle" value="{{ $slider->subtitle }}" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter subtitle">
                                                @error('subtitle')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="button_name">Button Name</label>
                                                    <input type="button_name" value="{{ $slider->button_name }}" name="button_name" id="button_name" class="form-control @error('button_name') is-invalid @enderror" placeholder="Enter button name">
                                                    @error('button_name')
                                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="button_link">Button Link</label>
                                                    <input type="button_link" value="{{ $slider->button_link }}" name="button_link" id="button_link" class="form-control @error('button_link') is-invalid @enderror" placeholder="Enter button link">
                                                    @error('button_link')
                                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" >{{ $slider->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Alignment</label>
                                            <label for="left">
                                                <input @if($slider->align == 'left') checked @endif class="d-none" type="radio" name="align" id="left" value="left"><i class="fa fa-align-left p-2 left-icon" aria-hidden="true"></i>
                                            </label>
                                            <label for="center">
                                                <input @if($slider->align == 'center') checked @endif class="d-none"type="radio" name="align" id="center" value="center"><i class="fa fa-align-center p-2 center-icon" aria-hidden="true"></i>
                                            </label>
                                            <label for="right">
                                                <input @if($slider->align == 'right') checked @endif class="d-none" type="radio" name="align" id="right" value="right"><i class="fa fa-align-right p-2 right-icon" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary my-2"><i class="fa fa-save"></i> Update Slider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_js')
<script>
    @if(session('success'))
        toastr["success"]("{{ session('success') }}")
    @elseif(session('error'))
        toastr["error"]("{{ session('error') }}")
    @endif
    $(document).ready(function() {
        CKEDITOR.replace('description');
        @if($slider->align == 'left')
            $('.left-icon').css('background-color','#10783b').css('color',"#fff");
        @endif
        @if($slider->align == 'center')
            $('.center-icon').css('background-color','#10783b').css('color',"#fff");
        @endif
        @if($slider->align == 'right')
            $('.right-icon').css('background-color','#10783b').css('color',"#fff");
        @endif
        $('.left-icon').click(function(){
            $('.left-icon').css('background-color','#10783b').css('color',"#fff");
            $('.center-icon').css('background-color','white').css('color',"#000");
            $('.right-icon').css('background-color','white').css('color',"#000");
        });
        $('.center-icon').click(function(){
            $('.center-icon').css('background-color','#10783b').css('color',"#fff");
            $('.left-icon').css('background-color','white').css('color',"#000");
            $('.right-icon').css('background-color','white').css('color',"#000");
        });
        $('.right-icon').click(function(){
            $('.right-icon').css('background-color','#10783b').css('color',"#fff");
            $('.center-icon').css('background-color','white').css('color',"#000");
            $('.left-icon').css('background-color','white').css('color',"#000");
        });
    });
</script>
@endsection
