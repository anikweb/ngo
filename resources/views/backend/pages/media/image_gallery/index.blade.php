@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('image-gallery.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">Image Gallery</div>
                    <div class="card-body">
                        @foreach ($imageGalleries as $imageGallery)
                            <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <div class="image_container" data-id={{ $imageGallery->id }}>
                                    <img src="{{ asset('images/media/image_gallery/'.$imageGallery->image) }}" class="img-fluid" alt="{{ $imageGallery->alt_text }}">
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="ml-4">
                        {{ $imageGalleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->
    {{-- <button type="button" class="btn btn-primary">Large modal</button> --}}

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid modal-img" src="" alt="">
                        </div>
                        <div class="col-md-6">
                            <form id="image_update_form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="alt_name">Alt Name</label>
                                    <input type="hidden" name="image_id" class="img_id_input">
                                    <input type="text" name="alt_name" class="form-control alt_name_input" placeholder="Enter Alt Name">
                                </div>
                                <div class="form-group">
                                    <label for="alt_name">Image URL</label>
                                    <input type="text" disabled class="form-control" id="img_url">
                                    <button
                                    type="button"
                                    class="btn btn-primary img_url_copy_btn mt-2"
                                    data-clipboard-target="#img_url"
                                    role="button"
                                    data-toggle="popover"
                                    data-trigger="focus"
                                    data-content="URL Copied"
                                    ><i class="fa fa-copy"></i> Copy Url</button>
                                </div>
                            </form>
                            <a href="#" class="btn btn-danger">Move to trash</a>
                            <a href="#" class="btn btn-danger">Permanetly Delete</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                    <button type="button" onclick="document.getElementById('image_update_form').submit()" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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
<script src="//cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
<script>
      $('.img_url_copy_btn').popover({
        container: 'body'
    })

    var clipboard = new ClipboardJS('.img_url_copy_btn');
     @if (session('success'))
            toastr.success('{{ session("success") }}','Success')
    @endif
    @if (session('error'))
        toastr.error('{{ session("error") }}','Failed')
    @endif

    $('.image_container').click(function(){
        var image_id = $(this).attr('data-id');
        // alert(image_id);
        $.ajax({
            type:"GET",
            url:"{{url('dashboard/get/image')}}/"+image_id,
            success:function(res){
                if(res){
                     $('.modal-img').attr('src','{{ asset("images/media/image_gallery") }}/'+res.image);
                     $('#img_url').val('{{ asset("images/media/image_gallery") }}/'+res.image);
                     $('.img_id_input').val(image_id);
                     $('.alt_name_input').val(res.alt_text);
                     $('#image_update_form').attr('action','{{ route("image-gallery.update.custom") }}/');
                }else{
                    // $("#state").empty();
                }
            }
        });


    });
    $('.trash-btn').click(function(){
        var project_id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire(
                'Deleted!',
                'Advisor has been deleted.',
                'success'
                )
                setTimeout(function() {
                    $('#trashForm-'+project_id).submit();
                }, 1000);
            }
        })
    });
</script>
@endsection
