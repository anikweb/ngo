@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Events</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Events</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                                            @if ($event->image)
                                                <img style="width:800px; height:460px;" id="image_preview" class="img-fluid d-block @error('image') border border-danger @enderror" src="{{ asset('images/projects/events/'.$event->image) }}" alt="{{ $event->title }}">
                                            @else
                                                <img style="width:800px; height:460px;" id="image_preview" class="img-fluid d-block @error('image') border border-danger @enderror" src="{{ asset('images/placeholder/1920x1280.jpg') }}" >
                                            @endif
                                            <label for="img" class="btn btn-primary mt-2 "><i class="fa fa-file-image"></i> Choose Featured Image </label>
                                            <input type="file" name="image" style="display: none" id="img" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                            @error('image')
                                                <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <input type="text" value="{{ $event->title }}" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title">
                                                @error('title')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="project_id">Under Project: <span class="text-danger">*</span></label>
                                                <select name="project_id" id="project_id" class="form-control @error('project_id') is-invalid @enderror">
                                                    @foreach ($projects as $project)
                                                        <option @if($event->project_id == $project->id) selected @endif value="{{ $project->id }}">{{ Str::title($project->title) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('project_id')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group border @error('description') border-danger @enderror p-1">
                                                <label for="description">Description <span class="text-danger">*</span></label>
                                                <textarea name="description" id="description" cols="30" rows="10">{{ $event->description }}</textarea>
                                                @error('description')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="location">Location <span class="text-danger">*</span></label>
                                                <input type="text" name="location" value="{{ $event->location }}" id="location" class="form-control @error('location') is-invalid @enderror">
                                                @error('location')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="event_date">Event Date <span class="text-danger">*</span></label>
                                                <input type="date" name="event_date" value="{{ $event->event_date }}" id="event_date" class="form-control @error('event_date') is-invalid @enderror">
                                                @error('event_date')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="sr-only" for="tags">Tags</label>
                                                <div class="input-group mb-2 mr-sm-2">
                                                    <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-tags text-primary"></i>  Tags</div>
                                                    </div>
                                                    <input type="text" data-role="tagsinput" name="tags" value="{{ $event->tags }}">
                                                </div>
                                                @error('tags')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary my-2"><i class="fa fa-save"></i> Save Project</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('internal_css')
    <link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('footer_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="{{ asset('js/tagsinput.js') }}"></script>
<script>
    @if(session('success'))
        toastr["success"]("{{ session('success') }}")
    @elseif(session('error'))
        toastr["error"]("{{ session('error') }}")
    @endif
    CKEDITOR.replace('description');
</script>
@endsection
