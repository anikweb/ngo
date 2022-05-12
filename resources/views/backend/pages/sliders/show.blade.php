@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $slider->title }}</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url()->previous(); }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $slider->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img style="width:800px; height:460px;" id="image_preview" class="img-fluid d-block" src="{{ asset('images/sliders/'.$slider->image) }}" alt="{{ $slider->title }}">
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <h2><strong>Title:</strong> <span>{{ $slider->title }}</span></h2>
                                </div>
                                <div>
                                    <h4><strong>Subtitle: </strong><span>{{ $slider->subtitle }}</span></h4>
                                </div>
                                <div>
                                    <h5><strong>Button Name: </strong><span>{{ $slider->button_name }}</span></h5>
                                </div>
                                <div>
                                    <h5><strong>Button Link: </strong><span><a href="{{ $slider->button_link }}">{{ $slider->button_link }}</a></span></h5>
                                </div>
                                <div>
                                    <strong>Alignment: </strong><span>{{ Str::title($slider->align) }}</span>
                                </div>
                            </div>
                        </div>
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
