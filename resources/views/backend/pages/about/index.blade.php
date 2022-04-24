@extends('backend.master')
@section('content')
    <div class="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Abouts</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about-settings.update',$about->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row pb-3">
                                        <div class="col-md-12">
                                            <img style="width:1590px; height:458px;" id="image_preview" class="img-fluid" src="{{ asset('images/about/'.$about->image) }}" >
                                        </div>
                                    </div>
                                    <label for="about" class="h4">Cover Image <span class="text-danger">*</span></label>
                                    <input type="file" name="cover_image" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">

                                </div>
                                <div class="col-md-12 text-danger">
                                    @error('cover_image')
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="about" class="h4">Our about <span class="text-danger">*</span></label>
                                    <textarea name="about" id="about">{{ $about->about }}</textarea>
                                    <div class="text-danger">
                                        @error('about')
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="mission" class="h4 pt-2">Our Mission <span class="text-danger">*</span></label>
                                    <textarea name="mission" id="mission">{{ $about->mission }}</textarea>
                                    <div class="text-danger">
                                        @error('mission')
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
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
        @if (session('success'))
            toastr.success('{{ session("success") }}','Success')
        @endif
        @if (session('error'))
            toastr.error('{{ session("error") }}','Failed')
        @endif
        $(document).ready(function() {
            CKEDITOR.replace('about');
            CKEDITOR.replace('mission');
        });
    </script>
@endsection
