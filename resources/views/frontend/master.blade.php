<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <!-- Meta Tags -->
    <meta name="viewport"                   content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type"         content="text/html; charset=UTF-8"/>
    <meta name="keywords"                   content="@if(isset($event->tags)) {{ $event->tags }} @else charity, crowdfunding, nonprofit, orphan, environmental, Poor, funding, fundrising, ngo, children, climate @endif" />
    <meta name="author"                     content="{{ generalSettings()->site_title }}" />
    @yield('og_meta')

    <!-- Page Title -->
    <title>@if(Route::is('frontend.team.advisor.index')) Adviser @elseif (Route::is('login')) Login @elseif(Route::is('frontend.team.official.index')) Official Team @elseif(Route::is('frontend.about')) About @elseif(Route::is('frontend.project.index')) {{ $project->title }}-Project @elseif(Route::is('frontend.events.index')) Events @elseif(Route::is('frontend.events.show')) {{ $event->title }}-Event @elseif(Route::is('frontend.image.gallery')) Image Gallery-Media @elseif(Route::is('frontend.publications.index')) Publications @elseif(Route::is('frontend.volunteer.apply')) Apply-Volunteer @elseif(Route::is('frontend.volunteer.store')) Successfully Applied-Volunteer @elseif(Route::is('frontend.terms.index')) Terms & Condition @elseif(Route::is('frontend.privacy.index')) Privacy & Policy @elseif(Route::is('frontend.refund.index')) Refund Policy @endif @if(Route::is('frontend')) {{ generalSettings()->site_title.' - '.generalSettings()->tagline }} @else {{ '-'.generalSettings()->site_title }}  @endif </title>

<!-- Favicon and Touch Icons -->
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="shortcut icon" type="image/png">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
{{-- <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"> --}}
{{-- <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"> --}}
<link href="{{ asset('assets/css/css-plugin-collections.css') }}" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{ asset('assets/css/menuzord-skins/menuzord-rounded-boxed.css')}}" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ asset('assets/css/style-main.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ asset('assets/css/preloader.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ asset('assets/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->

<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{ asset('assets/js/revolution-slider/css/settings.css')}}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('assets/js/revolution-slider/css/layers.css')}}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('assets/js/revolution-slider/css/navigation.css')}}" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="{{ asset('assets/css/colors/theme-skin-blue.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/font-awesome.min.css')}}">
<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="{{ asset('assets/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('assets/js/jquery-plugin-collection.js')}}"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
<style>
    .tab-slider .nav.nav-pills a:hover, .tab-slider .nav.nav-pills a.active, .custom-nav-tabs > li > a:hover, .widget .tags a:hover, .progress-item .progress-bar, .small-title .title::after, .title-icon::before, .title-icon::after, .testimonial .item::after, .drop-caps.colored-square p:first-child:first-letter, .drop-caps.colored-rounded p:first-child:first-letter, .list-icon.theme-colored.square li i, .list-icon.theme-colored.rounded li i, .working-process.theme-colored a, .widget.dark .tags a:hover, .blog-posts .post .entry-content .post-date.right, .horizontal-tab-centered .nav-pills > li > a:hover, .horizontal-tab-centered .nav-pills > li.active > a, .horizontal-tab-centered .nav-pills > li.active > a:hover, .horizontal-tab-centered .nav-pills > li.active > a:focus, .owl-theme.dot-theme-colored .owl-controls .owl-dot span, .pagination.theme-colored li.active a, .section-title .both-side-line::after, .section-title .both-side-line::before, .section-title .top-side-line::after, .section-title .left-side-line::before, .section-title .right-side-line::before, .product .tag-sale, .owl-theme .owl-dots .owl-dot.active span, .title-icon::after, .title-icon::before, .line-bottom:after, .line-bottom:before, .line-bottom:after, .line-bottom-no-border:after, .line-bottom-center:after, .line-bottom-center:before, .title-dots span, .home-countdown > li {
        background:  #10783b !important;
    }
    .border-theme-colored, .owl-theme .owl-dots .owl-dot span {
        border-color: #10783b;
    }
    .btn-theme-colored {
        color: #fff !important;
        background-color: #10783b !important;
        border-color: #208c4c !important;
    }
    .overlay-theme-colored:before {
        background-color: rgb(16 120 59) !important;
    }
    .layer-overlay.overlay-dark-8::before {
        background-color: rgb(16 120 59);
    }
    .btn-theme-colored:hover {
        color: #fff !important;;
        background-color: #0d6231 !important;;
        border-color: #064a22 !important;;
    }
    .btn-theme-colored:active, .btn-theme-colored.active, .open > .dropdown-toggle.btn-theme-colored {
        color: #fff !important;;
        background-color: #0d6231 !important;;
        border-color: #064a22 !important;;
    }
    .btn-theme-colored:focus, .btn-theme-colored.focus {
        color: #fff !important;;
        background-color: #0d6231 !important;;
        border-color: #064a22 !important;;
    }
    .showhide{
        background: white
    }
</style>
@yield('internal_css')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
    <!-- Messenger Chat Plugin Code Start -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "523630334653864");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v14.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = '//connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Messenger Chat Plugin Code end -->
    {{-- facebook comment start  --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="1ysZlWQx"></script>
    {{-- facebook comment end  --}}
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
            {{-- <div id="preloader">
                <div id="spinner">
                <img class="floating" width="250px" src="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" alt="{{ generalSettings()->site_title }}">
                <h5 class="line-height-50 font-18 ml-15">Loading...</h5>
                </div>
                <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
            </div> --}}
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top p-0 bg-light xs-text-center" data-bg-img="{{ asset('assets/images/footer-bg.png') }}">
                <div class="container pt-20 pb-20">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="widget no-border m-0">
                                <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="{{ route('frontend') }}">
                                    <img src="{{ asset('images/generalSettings/'.generalSettings()->logo) }}" alt="{{ generalSettings()->site_title }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="widget no-border clearfix m-0 mt-5">
                            <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                                <li>
                                <a class="text-success" target="_blank" href="{{ route('frontend.cooming.soon') }}">FAQ</a>
                                </li>
                                <li class="text-success">|</li>
                                <li>
                                <a class="text-success" target="_blank" href="{{ route('frontend.cooming.soon') }}">Help Desk</a>
                                </li>
                                <li class="text-success">|</li>
                                <li>
                                <a class="text-success" target="_blank" href="{{ route('frontend.cooming.soon') }}">Contact</a>
                                </li>
                                @auth

                                <li class="text-success">|</li>
                                <li>
                                    <a class="text-success" target="_blank" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="text-success">|</li>
                                <li>
                                    <a class="text-success" href="" target="_blank" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                    <li class="text-success">|</li>
                                    <li>
                                        <a class="text-success" href="{{  route('login' ) }}">Login</a>
                                    </li>
                                    @if (generalSettings()->membership == 2)
                                        <li class="text-success">|</li>
                                        <li>
                                            <a class="text-success" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                            </div>
                            <div class="widget top-widget-social no-border clearfix m-0 mt-5">
                                <ul class="styled-icons icon-gray icon-theme-colored icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                                    @foreach (contactInfo() as $item)
                                        @if ($item->platform->name == 'whatsapp')
                                        <li><a href="tel:{{ $item->username }}"><i class="{{Str::replace('fab', 'fa', $item->platform->icon)}}"></i></a></li>
                                        @else
                                            <li><a href="https://{{ $item->platform->url }}/{{ $item->username }}"><i class="{{Str::replace('fab', 'fa', $item->platform->icon)}}"></i></a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav ">
                <div class="header-nav-wrapper navbar-scrolltofixed">
                    <div class="container">
                    <nav id="menuzord" class="menuzord default ">
                        <ul class="menuzord-menu bg-theme-colored">
                            <li>
                                <a class="text-white mr-5 @if(Route::is('frontend')) actives @endif" href="{{ route('frontend') }}">Home</a>
                            </li>
                            <li>
                                <a class="text-white mr-5 @if(Route::is('frontend.project.index')) actives @endif"  href="javascript:void(0)">Projects</a>
                                <ul class="dropdown">
                                    @foreach (projects() as $project)
                                        <li><a href="{{ route('frontend.project.index',$project->slug) }}">{{ $project->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a class="text-white mr-5 @if(Route::is('frontend.events.index')||Route::is('frontend.events.show')) actives @endif" href="{{ route('frontend.events.index') }}">Events</a>
                                {{-- <ul class="dropdown">
                                <li><a href="event-list.html">Event List</a></li>
                                <li><a href="event-calendar.html">Event Calendar</a></li>
                                </ul> --}}
                            </li>
                            <li>
                                <a class="text-white mr-5" href="javascript:void(0)">Donations</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('frontend.cooming.soon') }}">Donate Now</a></li>
                                    <li><a href="{{ route('frontend.cooming.soon') }}">Donation Certificate</a></li>
                                    <li><a href="{{ route('frontend.cooming.soon') }}">Bank Information</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="text-white mr-5 @if(Route::is('frontend.team.advisor.index')||Route::is('frontend.team.official.index')) actives @endif" href="#">Team</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('frontend.team.advisor.index') }}">Adviser</a></li>
                                    <li><a href="{{ route('frontend.team.official.index') }}">Official</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="text-white mr-5 @if(Route::is('frontend.publications.index')||Route::is('frontend.image.gallery')) actives @endif" href="javascript:void">Media</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('frontend.publications.index')}}">Publications</a></li>
                                    <li><a href="{{ route('frontend.cooming.soon') }}">Press Releases</a></li>
                                    <li><a href="{{ route('frontend.image.gallery') }}">Image Gallery</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="text-white mr-5" href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a class="text-white mr-5" href="{{ route('frontend.about') }}">About us</a>
                            </li>
                            </ul>
                        <ul class="list-inline pull-right flip hidden-sm hidden-xs">
                            <li>
                                <a class="btn text-success  btn-flat bg-white mt-15 hvr-bounce-to-right" target="_blank" href="{{ route('frontend.cooming.soon') }}">Donate Now</a>
                            </li>
                            <li>
                                <a class="btn text-success btn-flat bg-white mt-15 hvr-bounce-to-right" href="{{ route('frontend.volunteer.apply') }}" >Join Us</a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </header>
        {{--  Main Content   --}}
        @yield('content')
        {{--  Main Content   --}}
        <!-- Divider: Clients -->
        <section class="clients bg-theme-colored">
            <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center text-white">Image Gallery</h4>
                </div>
                <div class="col-md-12 col-6">
                <!-- Section: Clients -->
                    <div class="owl-carousel-7col clients-logo transparent text-center">
                        @foreach (imageGallery() as $gallery)
                            <div class="item"> <a target="_blank" href="{{ asset('images/media/image_gallery/'.$gallery->image) }}"><img height="200" width="400" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" alt="{{ $gallery->alt_text }}"></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </section>
        <footer id="footer" class="footer" data-bg-img="{{ asset('assets/images/footer-bg.png') }}" data-bg-color="#25272e">
            <div class="container pt-70 pb-40">
            <div class="row border-bottom-black">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <img class="mt-10 mb-20" alt="{{ generalSettings()->site_title }}" src="{{ asset('images/generalSettings/'.generalSettings()->logo) }}">
                        <p  class="text-white">{{ generalSettings()->tagline }}</p>
                        <ul class="list-inline mt-5">
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a href="tel:+88-02-8391224">+88-02-8391224</a> </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a href="mailto:info@muktirbondhon.com">info@muktirbondhon.com</a> </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a href="https://muktirbondhon.com">www.muktirbondhon.com</a> </li>
                        </ul>
                        <h4 class="text-theme-colored">Office Address</h4>
                        <p class="text-white">61, Bijoynagar, Estern Arzoo, Room No. 06-5, Level 6, Dhaka-1000, Bangladesh</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Latest Events</h5>
                    <div class="latest-posts">
                        @foreach (events() as $event)
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a href="{{ route('frontend.events.show',$event->slug) }}" class="post-thumb">
                                    <img width="80px" alt="{{ $event->title }}" src="{{ asset('images/projects/events/'.$event->image) }}">
                                </a>
                                <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="{{ route('frontend.events.show',$event->slug) }}">{{ $event->title }}</a></h5>
                                <p class="post-date mb-0 font-12">{{ date('D m, Y',strtotime($event->event_date)) }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Visit</h5>
                    <ul class="list angle-double-right list-border">
                    <li style="color:#e0e0e0 !important"><a href="{{ route('frontend.cooming.soon') }}">Donate</a></li>
                    <li><a href="{{ route('frontend.cooming.soon') }}">Projects</a></li>
                    <li><a href="{{ route('frontend.events.index') }}">Events</a></li>
                    <li><a href="{{ route('frontend.image.gallery') }}">Media</a></li>
                    <li><a href="{{ route('frontend.volunteer.apply') }}">Join as Volunteer</a></li>
                    <li><a href="{{ route('frontend.cooming.soon') }}">Blog</a></li>
                    <li><a href="{{ route('frontend.terms.index') }}">Terms & Condition</a></li>
                    <li><a href="{{ route('frontend.privacy.index') }}">Privacy & Policy</a></li>
                    <li><a href="{{ route('frontend.refund.index') }}">Refund Policy</a></li>
                    <li><a href="{{ route('frontend.cooming.soon') }}">Constitution</a></li>
                    </ul>
                </div>
                </div>
                {{-- <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Opening Hours</h5>
                    <div class="opening-hours">
                    <ul class="list-border">
                        <li class="clearfix"> <span> Mon - Tues :  </span>
                        <div class="value pull-right"> 6.00 am - 10.00 pm </div>
                        </li>
                        <li class="clearfix"> <span> Wednes - Thurs :</span>
                        <div class="value pull-right"> 8.00 am - 6.00 pm </div>
                        </li>
                        <li class="clearfix"> <span> Fri : </span>
                        <div class="value pull-right"> 3.00 pm - 8.00 pm </div>
                        </li>
                        <li class="clearfix"> <span> Sun : </span>
                        <div class="value pull-right"> Colosed </div>
                        </li>
                    </ul>
                    </div>
                </div>
                </div> --}}
            </div>
            <div class="row mt-10">
                {{-- <div class="col-md-5">
                <div class="widget dark">
                    <h5 class="widget-title mb-10">Subscribe Us</h5>
                    <!-- Mailchimp Subscription Form Starts Here -->
                    <form id="mailchimp-subscription-form-footer" class="newsletter-form">
                    <div class="input-group">
                        <input type="email" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer" style="height: 45px;">
                        <span class="input-group-btn">
                        <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit">Subscribe</button>
                        </span>
                    </div>
                    </form>
                </div>
                </div> --}}
                <div class="col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title mb-10">Connect With Us</h5>
                    <ul class="styled-icons icon-dark icon-theme-colored icon-circled">
                        @foreach (contactInfo() as $item)
                            @if ($item->platform->name == 'whatsapp')
                            <li><a href="tel:{{ $item->username }}"><i class="{{Str::replace('fab', 'fa', $item->platform->icon)}}"></i></a></li>
                            @else
                                <li><a href="https://{{ $item->platform->url }}/{{ $item->username }}"><i class="{{Str::replace('fab', 'fa', $item->platform->icon)}}"></i></a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
            </div>
            <div class="footer-bottom bg-black-333">
            <div class="container pt-15 pb-10">
                <div class="row">
                <div class="col-md-6">
                    <p class="font-11 text-black-777 m-0">Copyright &copy; 2015-{{ date('y') }} <a href="{{ route('frontend') }}">Muktir Bondhon Foundation</a>. All Rights Reserved || Developed By <a target="_blank" style="color: #fff" href="https://facebook.com/anik.web.developer">Anik Kumar Nandi</a></p>
                </div>
                <div class="col-md-6 text-right">
                    <div class="widget no-border m-0">
                    <ul class="list-inline sm-text-center mt-5 font-12">
                        <li>
                        <a href="#">FAQ</a>
                        </li>
                        <li>|</li>
                        <li>
                        <a href="#">Help Desk</a>
                        </li>
                        <li>|</li>
                        <li>
                        <a href="#">Contact</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </footer>
    <a class="scrollToTop" href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>
    </div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
@yield('footer_js')
</body>
</html>
