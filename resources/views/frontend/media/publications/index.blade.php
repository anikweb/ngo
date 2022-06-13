@extends('frontend.master')
@section('internal_css')
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
{{-- Add the new slick-theme.css if you want the default styling --}}
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
@endsection
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
              <h3 class="title text-white">Latest Publications</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-primary">
      <div class="container pb-0 ">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">


                <div class="your-class p-2 bg-primary">
                    @foreach ($publications as $publication)
                        <div class="bg-white p-5">
                            <img style="height: 200px; width:300px" class="img-fluid card-img-top" src="{{ asset('images/media/publications/'.$publication->featured_image) }}" alt="{{ $publication->headline }}">
                            <h5>{{ Str::limit($publication->headline,32,'...') }}</h5>
                            <span class="badge">{{ $publication->media }}</span>
                            <p class="text-primary"> Published: {{ date('d-m-y',strtotime($publication->published)) }}</p>
                            <a style="display: block" class="btn btn-info" target="_blank" href="{{ $publication->url }}"><i class="fa fa-link"></i> See more</a>
                        </div>
                    @endforeach
                </div>


            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
@section('footer_js')
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    <script>

        $('.your-class').slick({
            centerMode: true,
            centerPadding: '200px',
            slidesToShow: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
        });

    </script>
@endsection
