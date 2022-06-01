@extends('frontend.master')
@section('content')
<!-- Start main-content -->
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/media/image_gallery/featured.jpg') }}">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title text-white">Image Gallery</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Grid 4 -->
    <section>
      <div class="container-fluid pb-0">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">

              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope grid-5 gutter clearfix">
                    @foreach ($image_galleries as $gallery)
                    <div class="gallery-item">
                        <div class="thumb">
                            <img alt="{{ $gallery->alt_text }}" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" class="img-fullwidth" style="height: 200px">
                            <div class="overlay-shade"></div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a href="{{ asset('images/media/image_gallery/'.$gallery->image) }}"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
              </div>
              <!-- End Portfolio Gallery Grid -->

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

