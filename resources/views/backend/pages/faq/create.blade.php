@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">FAQ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Add new FAQ</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('faq.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="question">Question<span class="text-danger">*</span> </label>
                                        <input type="text" value="{{ old('question')}}" class="form-control @error('question') is-invalid @enderror" name="question" id="question" placeholder="Enter question">
                                        @error('question')
                                            <span class="text-danger"><i class="fa fa-exclamation-circle"></i>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="answer">Answer<span class="text-danger">*</span> </label>
                                        <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" rows="1" placeholder="Type answer">{{ old('answer')}}</textarea>
                                        @error('answer')
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
