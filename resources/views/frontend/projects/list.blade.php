@extends('frontend.master')
@section('og_meta')
<meta property="description" content="Projects of {{ generalSettings()->site_title }}" />
    <meta property="og:url"  content="{{ url()->current() }}" />
    <meta property="og:type" content="Projects" />
    <meta property="og:title" content="Projects of {{ generalSettings()->site_title }}" />
    <meta property="og:description" content="Projects of {{ generalSettings()->site_title }}" />
    <meta property="og:image" content="{{ asset('images/about/'.$about->image) }}" />
@endsection
@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="text-white mt-20">Projects</h2>
                <ol class="breadcrumb white text-center mt-10">
                  <li><a href="{{ route('frontend') }}">Home</a></li>
                  <li class="active">Projects</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>

    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <p class="text-center lead">Here is the list of projects we have taken. Volunteers are constantly conducting various programs under these projects.</p>
            </div>
          </div>
          <div class="row mt-30">
              @foreach ($projects as $projectItem)
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="schedule-box maxwidth500 bg-lighter mb-30">
                    <div class="thumb">
                        <img class="img-fullwidth" alt="{{ $projectItem->title }}" src="{{ asset('images/projects/'.$projectItem->featured_image) }}">
                    </div>
                    <div class="schedule-details clearfix p-15 pt-10">
                        <h4 title="{{ $projectItem->title }}" class="title ‍c-title mt-0"><a href="{{route('frontend.project.index',$projectItem->slug)}}">{{ Str::limit($projectItem->title, 30, '...') }}</a></h4>
                        <div class="clearfix"></div>
                        <p class="mt-10">@php echo Str::limit($projectItem->description, 230, '....') @endphp @if(Str::length($projectItem->description) >230) <a href="{{route('frontend.project.index',$projectItem->slug)}}">More</a> @endif</p>
                        <div class="mt-10">
                            <a href="{{route('frontend.project.index',$projectItem->slug)}}" class="btn btn-success btn mt-10">Details</a>
                            <a href="{{route('frontend.donate.now',$projectItem->slug)}}" class="btn btn-theme-colored btn mt-10">Donate Now</a>
                        </div>
                    </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="divider layer-overlay overlay-theme-colored" data-bg-img="http://placehold.it/1920x1280">
        <div class="container pt-0 pb-0">
          <div class="row">
            <div class="call-to-action">
              <div class="col-md-9">
                <h2 class="text-white font-opensans font-30 mt-0 mb-5">Please raise your hand</h2>
                <h3 class="text-white font-opensans font-18 mt-0">for those helpless who need it</h3>
              </div>
              <div class="col-md-3 mt-30">
                <a href="{{ route('frontend.donate.index') }}" class="btn btn-default btn-circled btn-lg">Donate Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>

@endsection
