@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Privacy and Policy of Muktir Bondhon Foundation" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Privacy and Policy" />
    <meta property="og:title"               content="Privacy and Policy || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Privacy and Policy of Muktir Bondhon Foundation" />
    <meta property="og:image"               content="{{ asset('images/about/'.$about->image) }}" />
@endsection
@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/about/'.$about->image) }}">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title text-white">Privacy and Policy</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- main section  --}}

    <section class="position-inherit">
        <div class="container">
          <div class="row">
            <div class="col-md-3 scrolltofixed-container terms-sidebar">
              <div class="list-group scrolltofixed z-index-0">
                @foreach ($privacy as $pr)
                    <a href="#section-{{$pr->id}}" class="list-group-item smooth-scroll-to-target">{{$loop->index+1}}. {{ $pr->title }}</a>
                @endforeach
              </div>
            </div>
            <div class="col-md-9">
                @foreach ($privacy as $pr)
                    <div id="section-{{$pr->id}}" class="mb-50">
                        <h3>{{$loop->index+1}}. {{ $pr->title }}</h3>
                        <hr>
                        {!!$pr->description!!}
                    </div>
                @endforeach

            </div>
          </div>
        </div>
      </section>
  </div>
@endsection
@section('internal_css')
<style>
.text-theme-colored{
    color: #10783b !important;
}
.bg-theme-colored{
    background-color: #10783b !important;
}
</style>
@endsection
