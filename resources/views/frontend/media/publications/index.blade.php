@extends('frontend.master')
@section('og_meta')
<meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Publications" />
    <meta property="og:title"              content="Publications || {{ generalSettings()->site_title }}" />
    <meta property="og:description"        content="non-profit, non-governmental organization" />
    <meta property="og:image"              content="{{ asset('images/media/image_gallery/featured.jpg') }}" />
@endsection
@section('internal_css')
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
{{-- Add the new slick-theme.css if you want the default styling --}}
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
@endsection
@section('content')
<!-- Start main-content -->
<div class="main-content">
    <section class="bg-primary">
      <div class="container pt-0 pb-0 ">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
                @foreach ($projects as $project)
                        @if ($project->publications->count() !=0)
                            <h2 class="text-center text-white">{{ Str::upper($project->title) }}</h2>
                            <div class="your-class p-2 bg-primary">
                                @foreach ($project->publications as $projectPublication)
                                    <div class="bg-white p-5">
                                        <img style="height: 200px; width:300px" class="img-fluid card-img-top" src="{{ asset('images/media/publications/'.$projectPublication->featured_image) }}" alt="{{ $projectPublication->headline }}">
                                        <h5>{{ Str::limit($projectPublication->headline,32,'...') }}</h5>
                                        <span class="badge">{{ $projectPublication->media }}</span>
                                        <p class="text-primary"> Published: {{ date('d-M-Y',strtotime($projectPublication->published_date)) }}</p>
                                        <a style="display: block" class="btn btn-info" target="_blank" href="{{ $projectPublication->url }}"><i class="fa fa-link"></i> Read Article </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                @endforeach
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
            autoplay: true,
            autoplaySpeed: 2000,
            centerMode: true,
            centerPadding: '150px',
            slidesToShow: 3,

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
