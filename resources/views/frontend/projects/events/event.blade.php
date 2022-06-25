@extends('frontend.master')
@section('og_meta')
<meta property="description"        content="{!! $event->description !!}" />
    <meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Events" />
    <meta property="og:title"              content="{{ $event->title }}" />
    <meta property="og:description"        content="{!! $event->description !!}" />
    <meta property="og:image"              content="{{ asset('images/projects/events/'.$event->image) }}" />
@endsection
@section('content')
 <!-- Start main-content -->
 <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/projects/events/'.$event->image) }}">
        <div class="container pt-100 pb-50">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">{{ $event->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Event -->
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="{{ asset('images/projects/events/'.$event->image) }}" alt="{{ $event->title }}" class="img-responsive img-fullwidth">
                                </div>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                        @php
                                            $timestamp = strtotime($event->event_date);
                                        @endphp
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">@php echo date('d', $timestamp ) @endphp</li>
                                            <li class="font-12 text-white text-uppercase">@php echo date('M', $timestamp ) @endphp</li>
                                        </ul>
                                    </div>
                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h4 class="entry-title text-white text-uppercase m-0"><a href="javascript:void(0)">{{ $event->title }}</a></h4>
                                            <ul class="list-inline text-gray">
                                                <li><i class="fa fa-calendar mr-5"></i> @php echo date('d-F-Y', $timestamp ) @endphp </li>
                                                <li><i class="fa fa-map-marker mr-5"></i> {{ $event->location }}</li>
                                                <li><i class="fa fa-bookmark mr-5"></i> Project:  <a class="text-primary" href="{{ route('frontend.project.index',$event->project->slug) }}">{{ $event->project->title }}</a></li>
                                            </ul>
                                            {{-- <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 0 Comments</span>                        --}}
                                            {{-- <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 0 Likes</span> --}}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    echo $event->description;
                                @endphp
                                <div class="mt-30 mb-0">
                                    <h5 class="pull-left mt-10 mr-20 text-theme-colored">Share:</h5>
                                    <ul class="styled-icons icon-circled m-0">
                                        <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                                        <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                                        <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                        <div class="tagline p-0 pt-20 mt-5">
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
                        </div>
                        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10"></div>
                        {{-- Autho Details  --}}
                        {{-- <div class="author-details media-post">
                            <a href="#" class="post-thumb mb-0 pull-left flip pr-20"><img class="img-thumbnail" alt="" src="images/blog/author.jpg"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-0"><a href="#" class="font-18">John Doe</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <ul class="styled-icons square-sm m-0">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div> --}}
                        {{-- Comment Area  --}}
                        {{-- <div class="comments-area">
                            <h5 class="comments-title">Comments</h5>
                            <ul class="comment-list">
                                <li>
                                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment1.jpg" alt=""></a>
                                        <div class="media-body">
                                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                                        <div class="comment-date">23/06/2014</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                        <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment2.jpg" alt=""></a>
                                        <div class="media-body">
                                            <h5 class="media-heading comment-heading">John Doe says:</h5>
                                            <div class="comment-date">23/06/2014</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                            <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                                            <div class="clearfix"></div>
                                            <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img alt="" src="images/blog/comment3.jpg" class="img-thumbnail"></a>
                                                <div class="media-body p-20 bg-lighter">
                                                <h5 class="media-heading comment-heading">John Doe says:</h5>
                                                <div class="comment-date">23/06/2014</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                                <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                                                </div>
                                            </div>
                                            <div class="media comment-author nested-comment"> <a href="#" class="media-left pull-left flip pt-20"><img alt="" src="images/blog/comment1.jpg" class="img-thumbnail"></a>
                                                <div class="media-body p-20 bg-lighter">
                                                <h5 class="media-heading comment-heading">John Doe says:</h5>
                                                <div class="comment-date">23/06/2014</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                                <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment2.jpg" alt=""></a>
                                        <div class="media-body">
                                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                                        <div class="comment-date">23/06/2014</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                                        <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comment-box">
                            <div class="row">
                                <div class="col-sm-12">
                                <h5>Leave a Comment</h5>
                                <div class="row">
                                    <form role="form" id="comment-form">
                                    <div class="col-sm-6 pt-0 pb-0">
                                        <div class="form-group">
                                        <input type="text" class="form-control" required name="contact_name" id="contact_name" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" required class="form-control" name="contact_email2" id="contact_email2" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" placeholder="Enter Website" required class="form-control" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <textarea class="form-control" required name="contact_message2" id="contact_message2"  placeholder="Enter Message" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div> --}}
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
                <h3 class="text-white font-opensans font-18 mt-0">see latest related event</h3>
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
                    @foreach ($event->project->events as $evnt)
                        @if($evnt->id != $event->id)
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
                                            <li><i class="fa fa-map-marker mr-5"></i> {{ $event->location }}</li>
                                            <li><i class="fa fa-bookmark mr-5"></i> Project:  <a class="text-primary" href="{{ route('frontend.project.index',$event->project->slug) }}">{{ $event->project->title }}</a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        @php echo $evnt->description @endphp
                                        <div class="mt-10">
                                            <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="{{ route('frontend.events.show',$evnt->slug) }}">Read More</a>
                                            {{-- <a href="#" class="btn btn-default btn-sm mt-10">Details</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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
