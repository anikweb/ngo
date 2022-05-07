@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('advisors-settings.index') }}">Advisors</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Advisor</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Advisor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('advisors-settings.update',$advisor->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <input type="hidden" value="{{ $advisor->id }}" name="advisor_id">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text"  value="{{ $advisor->name }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name of advisor">
                                                @error('name')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="designation">Designation <span class="text-danger">*</span></label>
                                                <input type="text" value="{{ $advisor->designation }}" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Enter designation">
                                                @error('designation')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">E-mail <span class="text-danger">*</span></label>
                                                <input type="email" name="email" value="{{ $advisor->email }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                                                @error('email')
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="multi-field-wrapper">
                                                <div class="multi-fields">
                                                    <div class="multi-field my-2">
                                                        @forelse ($advisor->advisorSocial as $advisorSocial)
                                                        <div class="row multi-field-r-item my-2">
                                                            <div class="col-md-12 socialItem  input-group">
                                                                <input type="hidden" value="{{ $advisorSocial->id }}" name="advisor_social_id[]">
                                                                <select name="socialPlatform[]" id="platform" class="form-control">
                                                                        @foreach ($socialPlatforms as $socialPlatform)
                                                                            <option @if ($advisorSocial->platform->name == $socialPlatform->name) selected @endif value="{{ $socialPlatform->id }}">{{ Str::title($socialPlatform->name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" value="{{ $advisorSocial->username }}" name="username[]" class="form-control" placeholder="Username">
                                                                    <div class="input-group-append remove-field" data-id="{{ $advisorSocial->id }}">
                                                                        <!-- <i class=" fas fa-minus-circle"></i> -->
                                                                        <span class="input-group-text  text-danger" style="cursor:pointer"><i class=" fas fa-minus-circle"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                        <div class="row multi-field-r-item my-2">
                                                            <div class="col-md-12 socialItem  input-group">
                                                                <input type="hidden" value="" name="advisor_social_id[]">
                                                                <select name="socialPlatform[]" id="platform" class="form-control">
                                                                        @foreach ($socialPlatforms as $socialPlatform)
                                                                            <option value="{{ $socialPlatform->id }}">{{ Str::title($socialPlatform->name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="username[]" class="form-control" placeholder="Username">
                                                                    <div class="input-group-append remove-field" data-id>
                                                                        <!-- <i class=" fas fa-minus-circle"></i> -->
                                                                        <span class="input-group-text  text-danger" style="cursor:pointer"><i class=" fas fa-minus-circle"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <button type="button" class="add-field btn btn-primary mb-2 ">Add New</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card @error('image') border border-danger @enderror ">
                                        <div class="card-body text-center">
                                            @if ($advisor->image)
                                                <img class="card-img-top rounded" id="image_preview" src="{{ asset('images/advisors/'.$advisor->image) }}" alt="{{ $advisor->name }}">
                                            @else
                                                <img class="card-img-top rounded" id="image_preview" src="{{ asset('images/placeholder/image.jpg    ') }}" alt="{{ $advisor->name }}">
                                            @endif
                                            <label for="img" class="btn btn-primary mt-2"><i class="fa fa-file-image"></i> Choose Image </label>
                                            <input type="file" name="image" style="display: none" id="img" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                            @error('image')
                                                <div>
                                                    <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary"><i class="fa fa-save"></i> Update Advisor</button>
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
    $('.multi-field-wrapper').each(function(){
        var $wrapper = $('.multi-fields', this);
        $('.add-field').click(function(){
            $('.multi-field-r-item:first-child').clone(true).appendTo($wrapper).find('input').val('');
        });
        $('.remove-field').click(function(){
            var advisor_social_id = $(this).attr('data-id');
            // alert(advisor_id);
            if(advisor_social_id){

                $.ajax({
                    type:'GET',
                    url : '/dashboard/advisor/social/delete/'+advisor_social_id,
                    success:function(res){
                        if(res == true){
                            toastr["success"]("Deleted!");
                        }else{
                           alert('failed');
                        }
                    }
                });
                if($('.multi-field-r-item', $wrapper).length >1){
                    $(this).parent('.socialItem').parent('.multi-field-r-item').remove();
                }
            }
            // if($('.multi-field-r-item', $wrapper).length >1){
            //     $(this).parent('.socialItem').parent('.multi-field-r-item').remove();
            // }
        });
    });
</script>
@endsection
