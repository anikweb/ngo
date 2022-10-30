@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('privacy.index') }}">Privacy & Policy</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Update Privacy & Policy</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('privacy.update',$privacy->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $privacy->id }}">
                                        <label for="title">Title</label>
                                        <input type="text" value="{{ $privacy->title }}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
                                        @error('title')
                                            <span class="text-danger"><i class="fa fa-exclamation-circle"></i>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-danger">*</span> </label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="1" placeholder="Type Description">{{ $privacy->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger"><i class="fa fa-exclamation-circle"></i>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
