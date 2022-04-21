@extends('backend.master')
@section('content')
    <div class="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact and basic info</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Contact and basic info</h3>
                    </div>
                    <div class="card-body">
                        <h5>Social Links</h5>
                        <hr class="bg-muted">
                        <form action="{{ route('contact_and_basic_info.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="platform">Platform</label>
                                        <select name="platform" id="platform" class="form-control @error('platform') is-invalid @enderror">
                                            <option value="">-Select-</option>
                                            @foreach ($socialPlatforms as $socialPlatform)
                                                <option @if(old('platform') == $socialPlatform->id ) selected @endif value="{{ $socialPlatform->id }}">{{ Str::title($socialPlatform->name) }}</option>
                                            @endforeach
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
                                            <span class="input-group-text"><span id="socialURL">https://example.com/</span></span>
                                          </div>
                                          <input  name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
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
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Social Link</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Social Links</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact_and_basic_info as $contact)
                                        <tr>
                                            <td>{{ $contact_and_basic_info->firstItem() + $loop->index }}</td>
                                            <td> <span style="font-size: 25px; @if($contact->platform->name == 'youtube') background-color: #f00; color: #fff; @elseif($contact->platform->name == 'whatsapp') background-color: #45c655; color: #fff; @elseif($contact->platform->name == 'twitter') background-color: #1d9bee; color: #fff; @elseif($contact->platform->name == 'linkedin') background-color: #0a66c2; color: #fff; @elseif($contact->platform->name == 'behance') background-color: #2c72f2; color: #fff; @elseif($contact->platform->name == 'instagram') background-color: #ed4956; color: #fff; @elseif($contact->platform->name == 'tumblr') background-color: #1C3560; color: #fff; @elseif($contact->platform->name == 'pinterest') background-color: #b7081b; color: #fff; @elseif($contact->platform->name == 'facebook') background-color: #435e98; color: #fff;  @endif" class="btn rounded-circle"><i class="{{$contact->platform->icon}}"></i></span></td>
                                            <td>@if($contact->platform->name =='whatsapp') <a href="tel:{{$contact->username}}">{{$contact->username}}</a> @else <a target="_blank" href="https://{{ $contact->platform->url }}/{{ $contact->username }}">https://{{ $contact->platform->url }}/{{ $contact->username }}</a> @endif </td>
                                            <td>
                                                @if($contact->platform->name =='whatsapp') <a class="btn btn-primary" href="tel:{{$contact->username}}"><i class="fa fa-phone"></i></a> @else <a target="_blank" class="btn btn-primary" href="https://{{ $contact->platform->url }}/{{ $contact->username }}"><i class="fa fa-link"></i></a> @endif
                                                <a href="{{ route('contact_and_basic_info.edit',$contact->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('contact_and_basic_info.destroy',$contact->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $contact_and_basic_info->links() }}
                        </div>
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
        $(document).ready(function(){
            $('#platform').change(function(){
                var platform_value = $("#platform").val();
                if(platform_value){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'GET',
                        url : 'get/social/url/'+platform_value,
                        success:function(res){
                            if(res){
                                $('#socialURL').html(res);
                            }else{
                                $('#socialURL').html('+88');

                            }
                        }
                    });
                }else{
                    $("#state").empty();
                    $("#city").empty();
                }
            });
        });
    </script>
@endsection
