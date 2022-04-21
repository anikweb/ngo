<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Nonprofit, Crowdfunding & Charity" />
<meta name="keywords" content="charity,crowdfunding,nonprofit,orphan,Poor,funding,fundrising,ngo,children" />
<meta name="author" content="Muktir Bondhon Foundation" />

<!-- Page Title -->
<title> {{ generalSettings()->site_title.' - '.generalSettings()->tagline }}</title>

<!-- Favicon and Touch Icons -->
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="shortcut icon" type="image/png">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
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
<link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css">
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

<!-- external javascripts -->
<script src="{{ asset('assets/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('assets/js/jquery-plugin-collection.js')}}"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img class="floating" width="250px" src="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" alt="{{ generalSettings()->site_title }}">
      <h5 class="line-height-50 font-18 ml-15">Loading...</h5>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top p-0 bg-light xs-text-center" data-bg-img="{{ asset('assets/images/footer-bg.png') }}">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="widget no-border m-0">
              <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="{{ route('frontend') }}"><img src="{{ asset('images/generalSettings/'.generalSettings()->logo) }}" alt="mbf logo"></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="widget no-border clearfix m-0 mt-5">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li>
                  <a class="text-success" target="_blank" href="faq.html">FAQ</a>
                </li>
                <li class="text-success">|</li>
                <li>
                  <a class="text-success" target="_blank" href="faq.html">Help Desk</a>
                </li>
                <li class="text-success">|</li>
                <li>
                  <a class="text-success" target="_blank" href="contact.html">Contact</a>
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
            <div class="widget no-border clearfix m-0 mt-5">
              <ul class="styled-icons icon-gray icon-theme-colored icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="container">
          <nav id="menuzord" class="menuzord default">
            <ul class="menuzord-menu">
              <li class=" text-light"><a class="text-white mr-5 actives" href="#home">Home</a></li>
              <li ><a class=" text-white mr-5" href="#">Services</a>
                <ul class="dropdown">
                  <li><a href="environmental-conservation.html">Environmental Conservation</a></li>
                  <li><a href="education-for-sustainable-development.html">Education for sustainable development</a></li>
                  <li><a href="promoting-social-safety-for-all.html">Promoting social safety for all</a></li>
                  <li><a href="conservation-of-native-history-culture-and-pride.html">Conservation of native history, culture and pride</a></li>
                  <li><a href="safe-health-for-all.html">Safe health for all</a></li>
                  <li><a href="the-safe-road-for-all.html">The safe road for all</a></li>
                </ul>
              </li>
              <li><a class="text-white mr-5" href="#">Projects</a>
                <ul class="dropdown">
                  <li><a href="free-hut.html">Free hut</a></li>
                </ul>
              </li>
              <li><a class="text-white mr-5" href="#">Events</a>
                <ul class="dropdown">
                  <li><a href="event-list.html">Event List</a></li>
                  <li><a href="event-calendar.html">Event Calendar</a></li>
                </ul>
              </li>
              <li><a class="text-white mr-5" href="cause.html">Causes</a></li>
              <li><a class="text-white mr-5" href="#">Donations</a>
                <ul class="dropdown">
                  <li><a href="donate.html">Donate Now</a></li>
                  <li><a href="donation-certification.html">Donation Certificate</a></li>
                  <li><a href="bank-information.html">Bank Information</a></li>
                </ul>
              </li>
              <li><a class="text-white mr-5" href="#">Team</a>
                <ul class="dropdown">
                  <li><a href="advisers.html">Adviser</a></li>
                  <li><a href="officail-team.html">Official</a></li>
                </ul>
              </li>
              <li><a class="text-white mr-5" href="#">Media</a>
                <ul class="dropdown">
                  <li><a href="publications.html">Publications</a></li>
                  <li><a href="press-releases.html">Press Releases</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                </ul></li>
              <li><a class="text-white mr-5" href="blog.html">Blog</a></li>
            </ul>
            <ul class="list-inline pull-right flip hidden-sm hidden-xs">
              <li>
                <a class="btn text-success  btn-flat bg-white mt-15 hvr-bounce-to-right" target="_blank" href="donate.html">Donate Now</a>
              </li>
              <li>
                <a class="btn text-success btn-flat bg-white mt-15 hvr-bounce-to-right" href="became-volunteer.html" >Join Us</a>
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
<footer id="footer" class="footer" data-bg-img="{{ asset('assets/images/footer-bg.png') }}" data-bg-color="#25272e">
    <div class="container pt-70 pb-40">
      <div class="row border-bottom-black">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-20" alt="{{ generalSettings()->site_title }}" src="{{ asset('images/generalSettings/'.generalSettings()->logo) }}">
            <p>{{ generalSettings()->tagline }}</p>
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">123-456-789</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#">contact@yourdomain.com</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#">www.yourdomain.com</a> </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Useful Links</h5>
            <ul class="list angle-double-right list-border">
              <li><a href="#">Body Building</a></li>
              <li><a href="#">Fitness Classes</a></li>
              <li><a href="#">Weight lifting</a></li>
              <li><a href="#">Yoga Courses</a></li>
              <li><a href="#">Training</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
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
        </div>
      </div>
      <div class="row mt-10">
        <div class="col-md-5">
          <div class="widget dark">
            <h5 class="widget-title mb-10">Subscribe Us</h5>
            <!-- Mailchimp Subscription Form Starts Here -->
            <form id="mailchimp-subscription-form-footer" class="newsletter-form">
              <div class="input-group">
                <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer" style="height: 45px;">
                <span class="input-group-btn">
                  <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit">Subscribe</button>
                </span>
              </div>
            </form>
            <!-- Mailchimp Subscription Form Validation-->
            <script type="text/javascript">
              $('#mailchimp-subscription-form-footer').ajaxChimp({
                  callback: mailChimpCallBack,
                  url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
              });

              function mailChimpCallBack(resp) {
                  // Hide any previous response text
                  var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                      $response = '';
                  $mailchimpform.children(".alert").remove();
                  console.log(resp);
                  if (resp.result === 'success') {
                      $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                  } else if (resp.result === 'error') {
                      $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                  }
                  $mailchimpform.prepend($response);
              }
            </script>
            <!-- Mailchimp Subscription Form Ends Here -->
          </div>
        </div>
        <div class="col-md-3 col-md-offset-1">
          <div class="widget dark">
            <h5 class="widget-title mb-10">Call Us Now</h5>
            <div class="text-gray">
              +61 3 1234 5678 <br>
              +12 3 1234 5678
            </div>
          </div>
        </div>
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
            <p class="font-11 text-black-777 m-0">Copyright &copy; 2017-{{ date('y') }} Muktir Bondhon Foundation. All Rights Reserved</p>
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
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
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
