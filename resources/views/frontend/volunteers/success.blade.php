@extends('frontend.master')
@section('og_meta')
<meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Volunteer Application Success" />
    <meta property="og:title"              content="Volunteer Application Success" />
    <meta property="og:description"        content="Volunteer Application Success || {{ generalSettings()->site_title }}" />
    <meta property="og:image"              content="{{ asset('images/media/image_gallery/featured.jpg') }}" />
@endsection
@section('content')
<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-dark" data-bg-img="http://placehold.it/1920x1280">
        <div class="container pt-30 pb-30">
            <!-- Section Content -->
            <div class="section-content text-center">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                    <h2 class="text-theme-colored font-36">Become a Volunteer</h2>
                    <ol class="breadcrumb text-center mt-10 white">
                        <li><a href="{{ route('frontend') }}">Home</a></li>
                        <li class="active">Success</li>
                    </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('images/placeholder/success tick.gif') }}" alt="Muktir Bondhon Foundation">
                    <h1 class="h1">Success</h1>
                    <h4>Your Volunteer Applicant id is <strong class="text-success">{{ $volunteer->applicant_id }}</strong></h4>
                    <p class="h3">We will email/call you if you are approved by our Team.</p>
                    <p>Application form mailed to your email address (<strong class="text-primary">{{ $volunteer->email }}</strong>)</p>
                    <a href="{{ route('frontend.events.index') }}" class="btn btn-lg btn-theme-colored">See our Events</a>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

