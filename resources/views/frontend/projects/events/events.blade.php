@extends('frontend.master')
@section('og_meta')
<meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Events" />
    <meta property="og:title"              content="Events" />
    {{-- <meta property="og:description"        content="{!! $event->description !!}" /> --}}
    <meta property="og:image"              content="{{ asset('images/about/'.about()->image) }}" />
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
              <h3 class="title text-white">Events</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Events List -->
    <section>
        <div class="container pb-0">
            <div class="section-content">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="schedule-box maxwidth500 bg-lighter clearfix mb-30">
                                <div class="col-md-5">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="{{ $event->title }}" src="{{ asset('images/projects/events/'.$event->image) }}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="schedule-details clearfix p-15 pt-30">
                                        <div class="text-center pull-left flip bg-theme-colored p-10 pt-5 pb-5 mr-10">
                                            <ul>
                                                @php
                                                    $timestamp = strtotime($event->event_date);
                                                @endphp
                                                <li class="font-24 text-white font-weight-600 border-bottom ">@php echo date('d', $timestamp ) @endphp</li>
                                                <li class="font-18 text-white text-uppercase">@php echo date('M', $timestamp ) @endphp</li>
                                            </ul>
                                        </div>
                                        <h3 class="title mt-0"><a href="{{ route('frontend.events.show',$event->slug) }}">{{$event->title}}</a></h3>
                                        <ul class="list-inline text-gray">
                                            <li><i class="fa fa-calendar mr-5"></i> @php echo date('d-F-Y', $timestamp ) @endphp </li>
                                            <li><i class="fa fa-map-marker mr-5"></i> {{ $event->location }}</li>
                                            <li><i class="fa fa-bookmark mr-5"></i> Project:  <a class="text-primary" href="{{ route('frontend.project.index',$event->project->slug) }}">{{ $event->project->title }}</a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        @php echo Str::limit($event->description, 150, '.....') @endphp
                                        <div class="mt-10">
                                            <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="{{ route('frontend.events.show',$event->slug) }}">Read More</a>
                                            {{-- <a href="#" class="btn btn-default btn-sm mt-10">Details</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        {{ $events->links() }}
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
      .bg-theme-colored{
          background:#10783b !important;
      }
  </style>
 @endsection
