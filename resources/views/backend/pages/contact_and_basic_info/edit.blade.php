@extends('backend.master')
@section('content')
    <div class="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('contact_and_basic_info.index') }}">Contact and basic info</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="https://{{ $contactInfo->platform->name }}/{{ $contactInfo->username }}">https://{{ $contactInfo->platform->name }}/{{ $contactInfo->username }}</a></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $contactInfo->platform->name }}/{{ $contactInfo->username }}</h3>
                    </div>
                    <div class="card-body">
                        <h5>Social Links</h5>
                        <hr class="bg-muted">
                        <form action="{{ route('contact_and_basic_info.update',$contactInfo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="platform">Platform</label>
                                        <select disabled class="form-control">
                                            <option value="{{ $contactInfo->id }}">{{ Str::title($contactInfo->platform->name) }}</option>
                                        </select>
                                        <div class="text-danger">
                                            @error('platform')
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">@if($contactInfo->platform->url)<span id="socialURL">https://{{ $contactInfo->platform->url }}</span> @else <span id="socialURL">+88</span> @endif</span>
                                          </div>
                                          <input  name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ $contactInfo->username }}">
                                        </div>
                                        <div class="text-danger">
                                            @error('username')
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
    </script>
@endsection
