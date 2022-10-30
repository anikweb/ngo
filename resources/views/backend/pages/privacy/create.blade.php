@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('privacy.index') }}">Privacy & Policy</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Add new Privacy & Policy</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('privacy.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-danger">*</span> </label>
                                        <input type="text" value="{{ old('title')}}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
                                        @error('title')
                                            <span class="text-danger"><i class="fa fa-exclamation-circle"></i>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-danger">*</span> </label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="1" placeholder="Type Description">{{ old('description')}}</textarea>
                                        @error('description')
                                            <span class="text-danger"><i class="fa fa-exclamation-circle"></i>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
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
