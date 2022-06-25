@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="{!! $about->about !!}" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="about" />
    <meta property="og:title"               content="About || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="{!! $about->about !!}" />
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
              <h3 class="title text-white">About</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About  -->
    <section class="bg-lighter">
      <div class="container pb-30">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              {{-- <img class="img-fullwidth" src="http://placehold.it/555x280" alt=""> --}}
              <h3 class="line-bottom">Who We Are?</h3>
              <p>@php echo $about->about; @endphp</p>
              {{-- <a class="text-theme-colored font-13" href="page-about1.html">Read More →</a> --}}
            </div>
            <div class="col-md-6">
              <h3 class="line-bottom mt-0">Our Mission</h3>
              <p class="mb-30">@php echo $about->mission; @endphp</p>
              {{-- <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="icon-box p-0 mb-30">
                    <a class="icon icon-sm pull-left sm-pull-none flip bg-theme-colored mb-sm-15 mb-0 mr-10" href="#">
                      <i class="flaticon-charity-shelter text-white font-36"></i>
                    </a>
                    <h4 class="icon-box-title m-0 mb-5">Shelter for Poor</h4>
                    <p class="text-gray mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et magni temporibus voluptates adipisicing..</p>
                   <a href="#" class="text-theme-colored font-13">Read More →</a>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="icon-box p-0 mb-30">
                    <a class="icon icon-sm pull-left sm-pull-none flip bg-theme-colored mb-sm-15 mb-0 mr-10" href="#">
                      <i class="flaticon-charity-shaking-hands-inside-a-heart text-white font-36"></i>
                    </a>
                    <h4 class="icon-box-title m-0 mb-5">Help Poor Childreen</h4>
                    <p class="text-gray mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et magni temporibus voluptates adipisicing..</p>
                   <a href="#" class="text-theme-colored font-13">Read More →</a>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="icon-box p-0 mb-30">
                    <a class="icon icon-sm pull-left sm-pull-none flip bg-theme-colored mb-sm-15 mb-0 mr-10" href="#">
                      <i class="flaticon-charity-alms text-white font-36"></i>
                    </a>
                    <h4 class="icon-box-title m-0 mb-5">Funding for Poor</h4>
                    <p class="text-gray mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et magni temporibus voluptates adipisicing..</p>
                   <a href="#" class="text-theme-colored font-13">Read More →</a>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="icon-box p-0 mb-30">
                    <a class="icon icon-sm pull-left sm-pull-none flip bg-theme-colored mb-sm-15 mb-0 mr-10" href="#">
                      <i class="flaticon-charity-world-in-your-hands text-white font-36"></i>
                    </a>
                    <h4 class="icon-box-title m-0 mb-5">Reduce World Poverty</h4>
                    <p class="text-gray mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et magni temporibus voluptates adipisicing..</p>
                   <a href="#" class="text-theme-colored font-13">Read More →</a>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: volunteers -->
    {{-- <section id="volunteers">
      <div class="container pb-40">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6">
              <h5 class="font-weight-300 m-0">What we can do?</h5>
              <h2 class="mt-0 text-uppercase font-28">Our <span class="text-theme-colored font-weight-400">volunteers</span> <span class="font-30 text-theme-colored">.</span></h2>
              <div class="icon">
                <i class="fa fa-hospital-o"></i>
              </div>
            </div>
            <div class="col-md-6"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus hic suscipit doloremque deleniti ipsa quia dolor laborum natus tenetur, excepturi?</p></div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="owl-carousel-4col">
              <div class="item">
                <div class="team-member">
                  <div class="volunteer-thumb"> <img src="http://placehold.it/270x270" alt="" class="img-fullwidth img-responsive"> </div>
                  <div class="member-info mb-20">
                    <div class="member-biography p-20">
                      <h3 class="text-white mt-0 mb-10">Steve Smith</h3>
                      <h5 class="text-white">Student</h5>
                    </div>
                    <div class="social-network bg-white text-center">
                      <ul class="styled-icons icon-hover-theme-colored icon-circled pt-5">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-member">
                  <div class="volunteer-thumb"> <img src="http://placehold.it/270x270" alt="" class="img-fullwidth img-responsive"> </div>
                  <div class="member-info mb-20">
                    <div class="member-biography p-20">
                      <h3 class="text-white mt-0 mb-10">Martina Alex</h3>
                      <h5 class="text-white">Businessman</h5>
                    </div>
                    <div class="social-network bg-white text-center">
                      <ul class="styled-icons icon-hover-theme-colored icon-circled pt-5">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-member">
                  <div class="volunteer-thumb"> <img src="http://placehold.it/270x270" alt="" class="img-fullwidth img-responsive"> </div>
                  <div class="member-info mb-20">
                    <div class="member-biography p-20">
                      <h3 class="text-white mt-0 mb-10">Jessica Alba</h3>
                      <h5 class="text-white">Student</h5>
                    </div>
                    <div class="social-network bg-white text-center">
                      <ul class="styled-icons icon-hover-theme-colored icon-circled pt-5">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-member">
                  <div class="volunteer-thumb"> <img src="http://placehold.it/270x270" alt="" class="img-fullwidth img-responsive"> </div>
                  <div class="member-info mb-20">
                    <div class="member-biography p-20">
                      <h3 class="text-white mt-0 mb-10">Maria Andrew</h3>
                      <h5 class="text-white">Student</h5>
                    </div>
                    <div class="social-network bg-white text-center">
                      <ul class="styled-icons icon-hover-theme-colored icon-circled pt-5">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: Gallery -->
    <section id="gallery">
      <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6">
              <h5 class="font-weight-300 m-0">What we can do?</h5>
              <h2 class="mt-0 text-uppercase font-28">Our <span class="text-theme-colored font-weight-400">Gallery</span> <span class="font-30 text-theme-colored">.</span></h2>
              <div class="icon">
                <i class="fa fa-hospital-o"></i>
              </div>

            </div>
            <div class="col-md-6"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus hic suscipit doloremque deleniti ipsa quia dolor laborum natus tenetur, excepturi?</p></div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope grid-4 gutter clearfix">
                <!-- Portfolio Item Start -->
                @foreach ($image_galleries as $gallery)
                    <div class="gallery-item photography">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" alt="{{ $gallery->alt_text }}">
                            <div class="overlay-shade"></div>
                            <div class="text-holder text-center">
                                <h5 class="title">{{ $gallery->alt_text }}</h5>
                            </div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                    <a data-lightbox="image" href="{{ asset('images/media/image_gallery/'.$gallery->image) }}"><i class="fa fa-plus"></i></a>
                                    {{-- <a href="#"><i class="fa fa-link"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            <a class="hover-link" data-lightbox="image" href="{{ asset('images/media/image_gallery/'.$gallery->image) }}">View more</a>
                        </div>
                    </div>

                @endforeach
                <!-- Portfolio Item End -->
                {{-- video gallery start --}}
                {{-- @foreach ($image_galleries as $gallery)
                    <!-- Portfolio Item Start -->
                    <div class="gallery-item branding">
                        <div class="thumb">
                            <img class="img-fullwidth" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" alt="project">
                            <div class="overlay-shade"></div>
                            <div class="text-holder text-center">
                            <h5 class="title">Gallery Title Here</h5>
                            </div>
                            <div class="icons-holder">
                            <div class="icons-holder-inner">
                                <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                <a class="popup-vimeo" href="{{ asset('images/media/image_gallery/'.$gallery->image) }}"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Item End -->
                @endforeach --}}
                 {{-- video gallery end --}}

                {{-- slider gallery start --}}
                <!-- Portfolio Item Start -->
                {{-- @foreach ($image_galleries as $gallery)
                <div class="gallery-item design">
                  <div class="thumb">
                    <div class="flexslider-wrapper">
                      <div class="flexslider">
                        <ul class="slides">
                          <li><a href="{{ asset('images/media/image_gallery/'.$gallery->image) }}" title="Portfolio Gallery - Photo 1"><img src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" alt=""></a></li>
                          <li><a href="{{ asset('images/media/image_gallery/'.$gallery->image) }}" title="Portfolio Gallery - Photo 2"><img src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" alt=""></a></li>
                          <li><a href="{{ asset('images/media/image_gallery/'.$gallery->image) }}" title="Portfolio Gallery - Photo 3"><img src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" alt=""></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="overlay-shade"></div>
                    <div class="text-holder text-center">
                      <h5 class="title">Gallery Title Here</h5>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="#"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach --}}
                <!-- Portfolio Item End -->
                {{-- slider gallery end --}}
              </div>
              <!-- End Portfolio Gallery Grid -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Divider call -->
    <section class="divider parallax layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/media/image_gallery/featured.jpg') }}">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="call-to-action">
            <div class="col-md-9">
              <h2 class="text-white font-opensans font-30 mt-0 mb-5">Please raise your hand</h2>
              <h3 class="text-white font-opensans font-18 mt-0">for those helpless childrens who need it</h3>
            </div>
            <div class="col-md-3 mt-30">
              <a href="{{ route('frontend.cooming.soon') }}" class="btn btn-default btn-circled btn-lg">Donate Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-4">
              <div class="p-50 pl-40 pr-40 text-center bg-light">
                <h2 class="mt-0 font-22">Become a <br> Volunteer?</h2>
                <p>Do you want to work with us as a disadvantaged, socially oppressed and volunteer with the nature, climate, health, education of the country? Then register now.</p>
                <a class="btn btn-dark btn-theme-colored btn-sm" href="{{ route('frontend.volunteer.apply') }}">Apply Now</a>
              </div>
            </div>
            <div class="col-md-8">
              {{-- <div class="owl-carousel-1col owl-dots-bottom-right" data-dots="true">
                <div class="item">
                  <div class="row-fluid">
                    <div class="col-md-5">
                      <img src="http://placehold.it/450x500" alt="">
                    </div>
                    <div class="col-md-7">
                      <h4 class="mt-0 mb-0 text-black-666">Featured Causes:</h4>
                      <h2 class="line-bottom mt-0">Adopt with us</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam maxime nesciunt ex modi minus illum nemo provident ducimus, velit magnam consectetur adipisicing nemo provident ducimus, velit magnam.</p>
                      <div class="mt-10 mb-20">
                        <ul class="list-inline clearfix mt-10">
                          <li class="pull-left flip pr-0">Raised: <span class="font-weight-700 font-">$1890</span></li>
                          <li class="text-theme-colored pull-right flip pr-0">Goal: <span class="font-weight-700">$2500</span></li>
                        </ul>
                      </div>
                      <a class="btn btn-theme-colored btn-sm" href="#">Donate Now</a>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="row-fluid">
                    <div class="col-md-5">
                      <img src="http://placehold.it/450x500" alt="">
                    </div>
                    <div class="col-md-7">
                      <h4 class="mt-0 mb-0 text-black-666">Featured Causes:</h4>
                      <h2 class="line-bottom mt-0">Adopt with us</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam maxime nesciunt ex modi minus illum nemo provident ducimus, velit magnam consectetur adipisicing nemo provident ducimus, velit magnam.</p>
                      <div class="mt-10 mb-20">
                        <ul class="list-inline clearfix mt-10">
                          <li class="pull-left flip pr-0">Raised: <span class="font-weight-700 font-">$1890</span></li>
                          <li class="text-theme-colored pull-right flip pr-0">Goal: <span class="font-weight-700">$2500</span></li>
                        </ul>
                      </div>
                      <a class="btn btn-theme-colored btn-sm" href="#">Donate Now</a>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="row-fluid">
                    <div class="col-md-5">
                      <img src="http://placehold.it/450x500" alt="">
                    </div>
                    <div class="col-md-7">
                      <h4 class="mt-0 mb-0 text-black-666">Featured Causes:</h4>
                      <h2 class="line-bottom mt-0">Adopt with us</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam maxime nesciunt ex modi minus illum nemo provident ducimus, velit magnam consectetur adipisicing nemo provident ducimus, velit magnam.</p>
                      <div class="mt-10 mb-20">
                        <ul class="list-inline clearfix mt-10">
                          <li class="pull-left flip pr-0">Raised: <span class="font-weight-700 font-">$1890</span></li>
                          <li class="text-theme-colored pull-right flip pr-0">Goal: <span class="font-weight-700">$2500</span></li>
                        </ul>
                      </div>
                      <a class="btn btn-theme-colored btn-sm" href="#">Donate Now</a>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
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
