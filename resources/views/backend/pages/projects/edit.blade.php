@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Project</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <img style="width:800px; height:460px;" id="image_preview" src="{{ asset('images/projects/'.$project->featured_image) }}" class="img-fluid d-block @error('image') border border-danger @enderror">
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
                                                <input type="text" value="{{ $project->title }}" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title">
                                                @error('title')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description <span class="text-danger">*</span></label>
                                                <textarea name="description" id="description" cols="30" rows="10">{{ $project->description }}</textarea>
                                                @error('description')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary my-2"><i class="fa fa-save"></i> Update Project</button>
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
    CKEDITOR.replace('description');
</script>
@endsection
