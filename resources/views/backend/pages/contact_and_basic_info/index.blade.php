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
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="platform">Platform</label>
                                        <select name="platform" id="platform" class="form-control">
                                            <option value="">-Select-</option>
                                            @foreach ($socialPlatforms as $socialPlatform)
                                                <option value="{{ $socialPlatform->id }}">{{ Str::title($socialPlatform->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><span id="socialURL">https://example.com/</span></span>
                                          </div>
                                          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
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
    </div>
@endsection
@section('footer_js')
    <script>
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
                            $('#socialURL').html(res);
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
