@extends('frontend.master')
@section('og_meta')
<meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Comming Soon " />
    <meta property="og:title"              content="Comming Soon || {{ generalSettings()->site_title }}" />
    <meta property="og:description"        content="Comming Soon" />
    <meta property="og:image"              content="{{ asset('images/media/image_gallery/featured.jpg') }}" />
@endsection
@section('content')
<!-- start main-content -->
<div class="main-content">
    <!-- Section: home -->
    <section id="home" class="bg-lightest fullscreen">
        <div class="display-table text-center">
            <div class="display-table-cell">
                <div class="container pt-0 pb-0">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-1">
                            <h1 class="text-theme-colored font-weight-300 font-64">This page in under construction</h1>
                            <p class="font-14">Sorry.... We are improving and fixing problems of our website.<br>We will be back very soon....</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- end main-content -->
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
