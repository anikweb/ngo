@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Publications</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12 pt-2">
               <div class="card card-primary">
                   <div class="card-header">Edit Publications</div>
                   <div class="card-body">
                    <form action="{{ route('publications.update',$publication->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="publication_id" value="{{ $publication->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="headline">Headline <span>*</span></label>
                                    <input type="text" name="headline" value="{{ $publication->headline }}" id="headline" class="form-control @error('headline') is-invalid @enderror" placeholder="Enter headline">
                                    @error('headline')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">URL <span>*</span></label>
                                    <input type="text" value="{{ $publication->url }}" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter url">
                                    @error('url')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="project_id">Project <span>*</span></label>
                                    <select name="project_id" id="project_id" class="form-control">
                                        <option>-Select-</option>
                                        @foreach($projects as $project)
                                            <option @if($project->id == $publication->project_id) selected @endif value="{{$project->id}}">{{$project->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('project_id')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="media">Print/Electronic Media <span>*</span></label>
                                    <input type="text" value="{{ $publication->media }}" name="media" id="media" class="form-control" @error('media') is-invalid @enderror placeholder="Enter name of media">
                                    @error('media')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="published_date">Published Date <span>*</span></label>
                                    <input type="date" value="{{ $publication->published_date }}" name="published_date" id="published_date" class="form-control @error('published_date') is-invalid @enderror">
                                    @error('published_date')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="featured_image">Featured Image <span>*</span>
                                    <img src="{{ asset('images/media/publications/'.$publication->featured_image) }}" id="image_preview" alt="placeholder image" class="img-fluid @error('featured_image')  border border-danger @enderror">
                                </label>
                                @error('featured_image')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-auto">
                                <input type="file" name="featured_image" id="featured_image" class="d-none" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                <button type="button" onclick="document.getElementById('featured_image').click()" class="btn btn-primary">Choose Image</button>
                            </div>
                            <div class="col-md-12 text-center">
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
@section('internal_css')
<style>
    .image_container{
        float: left;
        overflow: hidden;
        width: 160px;
        height: 150px;
        margin: 5px;
    }
    .image_container img{
       width: 100%;
       height: 100%;
    }
</style>
@endsection
@section('footer_js')
<script>
    $('.img_url_copy_btn').popover({
        container: 'body'
    })
    function copyURL(){
        var copyText = document.getElementById("img_url");
         /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

    }
     @if (session('success'))
            toastr.success('{{ session("success") }}','Success')
    @endif
    @if (session('error'))
        toastr.error('{{ session("error") }}','Failed')
    @endif

    $('.delete-btn').click(function(){
        var image_id = $(this).attr('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!, and this image will show missing images where URLs have been used",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire(
                'Deleted!',
                'Image deleted, you can not recover in future.',
                'success'
                )
                setTimeout(function() {
                    $('#trashForm-'+image_id).submit();
                }, 1000);
            }
        })
    });
</script>
@endsection
