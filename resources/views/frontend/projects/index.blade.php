@extends('frontend.master')
@section('og_meta')
    <meta property="description"        content="{!! $project->description !!}" />
    <meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Project" />
    <meta property="og:title"              content="{{ $project->title }}" />
    <meta property="og:description"        content="{!! $project->description !!}" />
    <meta property="og:image"              content="{{ asset('images/projects/'.$project->featured_image) }}" />
@endsection
@section('content')
 <!-- Start main-content -->
 <div class="main-content">
    <!-- Section: Event -->
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="{{ asset('images/projects/'.$project->featured_image) }}" alt="{{ $project->title }}" class="img-responsive img-fullwidth">
                                </div>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h3 class="entry-title text-uppercase p-0 m-0">{{ $project->title }}</h3>
                                            {{-- <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 0 Comments</span>                        --}}
                                            {{-- <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 0 Likes</span> --}}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    echo $project->description
                                @endphp
                                <div class="mt-30 mb-0">
                                    <h5 class="pull-left mt-10 mr-20 text-theme-colored">Share:</h5>
                                    <ul class="styled-icons icon-circled m-0">
                                        <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                                        <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                                        <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                                    </ul>
                                </div>
                                <div>
                                    <a href="{{ route('frontend.donate.now',$project->slug) }}" class="btn btn-theme-colored">Donate Now</a>
                                </div>
                            </div>
                        </article>
                        {{-- <div class="tagline p-0 pt-20 mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tags">
                                        @php
                                            $tags = Str::of($event->tags)->explode(',');
                                        @endphp
                                        <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Tags:</span> @foreach ($tags as $tag) <span class="badge badge-primary">{{ $tag }}</span> @endforeach</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Related Events  --}}
    <section class="divider parallax layer-overlay overlay-dark-8" data-bg-img="">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="call-to-action">
                    <div class="col-md-9">
                        <h2 class="text-white font-opensans font-30 mt-0 mb-5">Related Events</h2>
                        <h3 class="text-white font-opensans font-18 mt-0">See latest related event</h3>
                    </div>
                    <div class="col-md-3 mt-30">
                        <a href="{{ route('frontend.events.index') }}" class="btn btn-default btn-circled btn-lg">See all Events</a>
                    </div>
                </div>
            </div>
        </div>
      </section>
    <section>
        <div class="container pb-0">
            <div class="section-content">
                <div class="row">
                    @foreach ($project->events as $evnt)
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-50">
                            <div class="schedule-box maxwidth500 bg-lighter clearfix mb-30">
                                <div class="col-md-5">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="{{ $evnt->title }}" src="{{ asset('images/projects/events/'.$evnt->image) }}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="schedule-details clearfix p-15 pt-30">
                                        <div class="text-center pull-left flip bg-theme-colored p-10 pt-5 pb-5 mr-10">
                                            <ul>
                                                @php
                                                    $timestamp = strtotime($evnt->event_date);
                                                @endphp
                                                <li class="font-24 text-white font-weight-600 border-bottom ">@php echo date('d', $timestamp ) @endphp</li>
                                                <li class="font-18 text-white text-uppercase">@php echo date('M', $timestamp ) @endphp</li>
                                            </ul>
                                        </div>
                                        <h3 class="title mt-0"><a href="{{ route('frontend.events.show',$evnt->slug) }}">{{$evnt->title}}</a></h3>
                                        <ul class="list-inline text-gray">
                                            <li><i class="fa fa-calendar mr-5"></i> @php echo date('d-F-Y', $timestamp ) @endphp </li>
                                            <li><i class="fa fa-map-marker mr-5"></i> {{ $evnt->location }}</li>
                                            <li><i class="fa fa-bookmark mr-5"></i> Project:  <a class="text-primary" href="{{ route('frontend.project.index',$evnt->project->slug) }}">{{ $evnt->project->title }}</a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        @php echo $evnt->description @endphp
                                        <div class="mt-10">
                                            <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="{{ route('frontend.events.show',$evnt->slug) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
@section('internal_css')
 <style>
     .bg-theme-colored{
         background:#10783b !important;
     }
 </style>
@endsection
