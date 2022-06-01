@extends('frontend.master')
@section('content')
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home">
        <div class="container-fluid p-0">
            <!-- Slider Revolution Start -->
            <div class="rev_slider_wrapper">
                <div class="rev_slider rev_slider_default" data-version="5.0">
                    <ul>

                        @foreach ($sliders as $key => $slider)
                            <!-- SLIDER -->
                            <li data-index="rs-{{$key+1}}"
                                data-transition="slidingoverlayhorizontal"
                                data-slotamount="default"
                                data-easein="default"
                                data-easeout="default"
                                data-masterspeed="default"
                                data-thumb="{{ asset('images/sliders/'.$slider->image) }}"
                                data-rotate="0"
                                data-saveperformance="off"
                                data-title="Slide {{$key+1}}"
                                data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="{{ asset('images/sliders/'.$slider->image) }}"
                                    alt="{{ $slider->title }}"
                                    data-bgposition="center center"
                                    data-bgfit="cover"
                                    data-bgrepeat="no-repeat"
                                    class="rev-slidebg"
                                    data-bgparallax="10"
                                    data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent pr-20 pl-20"
                                    id="rs-{{$key+1}}-layer-1"
                                    data-x="['{{$slider->align}}']"
                                    data-hoffset="['30']"
                                    data-y="['middle']"
                                    data-voffset="['-90']"
                                    data-fontsize="['64']"
                                    data-lineheight="['72']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-transform_idle="o:1;s:500"
                                    data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                    data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                    data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                    data-start="1000"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-responsive_offset="on"
                                    style="z-index: 7; white-space: nowrap; font-weight:600;"><span class="">{{ $slider->title }}
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway"
                                    id="rs-{{$key+1}}-layer-2"
                                    data-x="['{{$slider->align}}']"
                                    data-hoffset="['35']"
                                    data-y="['middle']"
                                    data-voffset="['-25']"
                                    data-fontsize="['32']"
                                    data-lineheight="['54']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-transform_idle="o:1;s:500"
                                    data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                    data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                    data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                    data-start="1000"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-responsive_offset="on"
                                    style="z-index: 7; white-space: nowrap; font-weight:600;">{{$slider->subtitle}}
                                </div>
                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption tp-resizeme"
                                    id="rs-{{$key+1}}-layer-4"
                                    data-x="['{{$slider->align}}']"
                                    data-hoffset="['35']"
                                    data-y="['middle']"
                                    data-voffset="['95']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-transform_idle="o:1;"
                                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                    data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                    data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                    data-start="1400"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-responsive_offset="on"
                                    style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                                    <a class="btn btn-colored btn-lg btn-flat btn-theme-colored pl-20 pr-20"
                                        href="{{$slider->button_link}}">{{$slider->button_name}}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end .rev_slider -->
            </div>
            <!--  Revolution slider scriopt -->
            <!-- Slider Revolution Ends -->
        </div>
    </section>

    <!-- Section: About  -->
    <section>
      <div class="container pb-30">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <img class="img-fullwidth" src="http://placehold.it/555x280" alt="">
              <h3 class="line-bottom">Who We Are?</h3>
              <p>@php echo $about->about; @endphp</p>
              <a class="text-theme-colored font-13" href="page-about1.html">Read More →</a>
            </div>
            <div class="col-md-6">
              <h3 class="line-bottom mt-0 mt-sm-30">Our Mission</h3>
              <p class="mb-30">@php echo $about->mission; @endphp</p>
              <div class="row">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: home-boxes -->
    <section>
      <div class="container pt-0">
        <div class="section-content">
          <div class="row equal-height-inner home-boxes">
            <div class="col-sm-12 col-md-4 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
              <div class="sm-height-auto bg-theme-colored">
                <div class="p-30 mb-sm-30">
                  <h3 class="text-uppercase text-white mt-0">Become a Volunteer</h3>
                  <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                  <a href="page-become-a-volunteer.html" class="btn btn-border btn-circled btn-transparent btn-sm">Join us Now</a>
                </div>
                <i class="flaticon-charity-shaking-hands-inside-a-heart bg-icon"></i>
              </div>
            </div>
            <div class="col-sm-12 col-md-4 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
              <div class="sm-height-auto bg-theme-colored-darker2">
                <div class="p-30 mb-sm-30">
                  <h3 class="text-uppercase text-white mt-0">Adopt a Child</h3>
                  <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                  <a href="#" class="btn btn-border btn-circled btn-transparent btn-sm">Contact us</a>
                </div>
                <i class="flaticon-charity-home-insurance bg-icon"></i>
              </div>
            </div>
            <div class="col-sm-12 col-md-4 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
              <div class="sm-height-auto bg-theme-colored-darker3">
                <div class="p-30 mb-sm-30">
                  <h3 class="text-uppercase text-white mt-0">Get Involved</h3>
                  <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                  <a href="page-donate.html" class="btn btn-border btn-circled btn-transparent btn-sm">Donate Us</a>
                </div>
                <i class="flaticon-charity-make-an-online-donation bg-icon"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Upcoming Events -->
    <section class="bg-silver-light">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i>Upcoming <span class="text-theme-colored">Events</span></h3>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-20"><img alt="" src="http://placehold.it/120x120"></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="page-single-event.html">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>
                  <a class="text-theme-colored font-13" href="page-single-event.html">Read More →</a>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-20"><img alt="" src="http://placehold.it/120x120"></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="page-single-event.html">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>
                  <a class="text-theme-colored font-13" href="page-single-event.html">Read More →</a>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-20"><img alt="" src="http://placehold.it/120x120"></a>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="page-single-event.html">Upcoming Event Title</a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                  </ul>
                  <p class="mb-0 font-13">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>
                  <a class="text-theme-colored font-13" href="page-single-event.html">Read More →</a>
                </div>
              </article>
            </div>
            <div class="col-md-7">
              <h3 class="text-uppercase title line-bottom mt-0 mb-30 mt-sm-40"><i class="fa fa-thumb-tack text-gray-darkgray mr-10"></i>Latest <span class="text-theme-colored">Causes</span></h3>
              <div class="owl-carousel-2col">
                <div class="item">
                  <div class="causes bg-white maxwidth500 mb-sm-30">
                    <div class="thumb">
                      <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                      <div class="overlay-donate-now">
                        <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                      </div>
                    </div>
                    <div class="progress-item mt-0">
                      <div class="progress mb-0">
                        <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                      </div>
                    </div>
                    <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                      <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Sponsor a child today</a></h5>
                      <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                      <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                        <li class="pull-left pr-0">Raised: $1890</li>
                        <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="causes bg-white maxwidth500 mb-sm-30">
                    <div class="thumb">
                      <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                      <div class="overlay-donate-now">
                        <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                      </div>
                    </div>
                    <div class="progress-item mt-0">
                      <div class="progress mb-0">
                        <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                      </div>
                    </div>
                    <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                      <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Sponsor a child today</a></h5>
                      <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                      <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                        <li class="pull-left pr-0">Raised: $1890</li>
                        <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="causes bg-white maxwidth500 mb-sm-30">
                    <div class="thumb">
                      <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                      <div class="overlay-donate-now">
                        <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                      </div>
                    </div>
                    <div class="progress-item mt-0">
                      <div class="progress mb-0">
                        <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                      </div>
                    </div>
                    <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                      <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Sponsor a child today</a></h5>
                      <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                      <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                        <li class="pull-left pr-0">Raised: $1890</li>
                        <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Become a Volunteer -->
    <section class="divider parallax layer-overlay overlay-dark-4" data-bg-img="http://placehold.it/1920x1280" data-parallax-ratio="0.7">
      <div class="container pt-110 pb-110">
        <div class="row">
          <div class="col-md-8">
            <h3 class="text-white font-24 font-weight-600 mb-5">Want to be a Volunteer?</h3>
            <h2 class="text-white font-36 text-uppercase font-weight-600 mt-0">Become a Proud <span class="text-theme-colored">Volunteer</span></h2>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis totam, laudantium officia praesentium expedita omnis unde tempora beatae, modi, sequi quis. Est quas corporis, nobis aperiam cumque minima libero rem, itaque quo vitae odit?</p>
            <a href="#" class="btn btn-lg btn-default mt-20">Join Now</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Causes -->
    <section class="bg-silver-light">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0">Our Causes</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Education for Childreen</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Sponsor a child today</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Shelter for Poor Child</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Happiness for orphan child</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-sm-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Donation for helpless child</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-sm-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Foor for Poor child</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-sm-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Help the poor girls</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="causes bg-white maxwidth500 mb-sm-30">
              <div class="thumb">
                <img src="http://placehold.it/320x240" alt="" class="img-fullwidth">
                <div class="overlay-donate-now">
                  <a href="page-donate.html" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a>
                </div>
              </div>
              <div class="progress-item mt-0">
                <div class="progress mb-0">
                  <div data-percent="84" class="progress-bar"><span class="percent">0</span></div>
                </div>
              </div>
              <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
                <h5 class="font-weight-600 font-16"><a href="page-single-cause.html">Donate for child happiness</a></h5>
                <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quos sit.</p>
                <ul class="list-inline font-weight-600 border-top clearfix mt-20 pt-10">
                  <li class="pull-left pr-0">Raised: $1890</li>
                  <li class="text-theme-colored pull-right pr-0">Goal: $2500</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Funfact -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="http://placehold.it/1920x1280" data-parallax-ratio="0.7">
      <div class="container pt-90 pb-90">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="754" class="animate-number text-white font-42 font-weight-500 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Happy Donators</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-rocket mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-42 font-weight-500 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Success Mission</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-add-user mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="1248" class="animate-number text-white font-42 font-weight-500 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Volunteer Reached</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-global mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="24" class="animate-number text-white font-42 font-weight-500 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Globalization Work</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Gallery -->
    <section id="gallery">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-7 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
              <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i>Photo <span class="text-theme-colored">Gallery</span></h3>
              <!-- Portfolio Gallery Grid -->

              <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                <!-- Portfolio Item Start -->
                @foreach ($image_galleries as $gallery)
                    <div class="gallery-item">
                        <div class="thumb">
                            <img alt="{{ $gallery->alt_text }}" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}" class="img-fullwidth" style="height: 120px">
                            <div class="overlay-shade"></div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                        <a href="{{ asset('images/media/image_gallery/'.$gallery->image) }}"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Portfolio Item End -->

              </div>
            <div class="mt-5">
                <a href="#" class="btn btn-lg btn-theme-colored">See More</a>
            </div>
              <!-- End Portfolio Gallery Grid -->
            </div>

            <div class="col-md-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
              <h3 class="text-uppercase title line-bottom mt-0 mb-30 mt-sm-40"><i class="fa fa-calendar text-gray-darkgray mr-10"></i>Client <span class="text-theme-colored">Testimonials</span></h3>

                <div class="bxslider bx-nav-top">
                    <div class="testimonial media sm-maxwidth400 p-15 mt-0 mb-15">
                        <div class="pt-10">
                            <div class="thumb pull-left mb-0 mr-0 pr-20">
                                <img width="75" class="img-circle" alt="" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}">
                            </div>
                            <div class="ml-100 ">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</p>
                                <p class="author mt-10">- <span class="text-theme-colored">Catherine Grace,</span> <small><em>CEO apple.inc</em></small></p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial media sm-maxwidth400 p-15 mt-0 mb-15">
                        <div class="pt-10">
                            <div class="thumb pull-left mb-0 mr-0 pr-20">
                                <img width="75" class="img-circle" alt="" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}">
                            </div>
                            <div class="ml-100 ">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</p>
                                <p class="author mt-10">- <span class="text-theme-colored">Catherine Grace,</span> <small><em>CEO apple.inc</em></small></p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial media sm-maxwidth400 p-15 mt-0 mb-15">
                        <div class="pt-10">
                            <div class="thumb pull-left mb-0 mr-0 pr-20">
                                <img width="75" class="img-circle" alt="" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}">
                            </div>
                            <div class="ml-100 ">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</p>
                                <p class="author mt-10">- <span class="text-theme-colored">Catherine Grace,</span> <small><em>CEO apple.inc</em></small></p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial media sm-maxwidth400 p-15 mt-0 mb-15">
                        <div class="pt-10">
                            <div class="thumb pull-left mb-0 mr-0 pr-20">
                                <img width="75" class="img-circle" alt="" src="{{ asset('images/media/image_gallery/'.$gallery->image) }}">
                            </div>
                            <div class="ml-100 ">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</p>
                                <p class="author mt-10">- <span class="text-theme-colored">Catherine Grace,</span> <small><em>CEO apple.inc</em></small></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- section: Latest Events --}}
    <section class="bg-silver-light">
        <div class="container">
          <div class="section-content">
            <div class="container pt-0">
                <div class="section-title text-center">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-uppercase title mt-0 mb-30 mt-sm-40"><i class="fa fa-calendar text-gray-darkgray mr-10"></i>Latest <span class="text-theme-colored">Events</span></h3>
                      <p>Here our latest events</p>
                    </div>
                  </div>
                </div>
            <div class="row mt-30">
                @foreach ($events as $event)
                  <div class="col-sm-4 col-md-4 col-lg-4">
                      <div class="schedule-box maxwidth500 bg-lighter mb-30">
                      <div class="thumb">
                          <img class="img-fullwidth" alt="{{ $event->title }}" src="{{ asset('images/projects/events/'.$event->image) }}">
                      </div>
                      <div class="schedule-details clearfix p-15 pt-10">
                          <h4 class="title ‍c-title mt-0"><a href="{{route('frontend.events.show',$event->slug)}}">{{ $event->title }}</a></h4>
                          <div class="clearfix"></div>
                          <p class="mt-10">@php echo Str::limit($event->description, 230, '....') @endphp @if(Str::length($event->description) >230) <a href="{{route('frontend.events.show',$event->slug)}}">More</a> @endif</p>
                          <div class="mt-10">
                          <a href="{{route('frontend.events.show',$event->slug)}}" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                          </div>
                      </div>
                      </div>
                  </div>
                @endforeach
                <div class="col-md-12 text-center">
                    <a href="{{ route('frontend.events.index') }}" class="btn btn-lg btn-theme-colored">See More</a>
                </div>
            </div>
          </div>
        </div>
    </section>
    <!-- Section: blog -->
    <section id="blog">
      <div class="container pt-0">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0">Our Blog</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix mb-sm-30 bg-silver-light">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="http://placehold.it/540x370" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20 pr-10">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom">28</li>
                        <li class="font-12 text-white text-uppercase">Feb</li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                  <a href="#" class="btn-read-more">Read more</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix mb-sm-30 bg-silver-light">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="http://placehold.it/540x370" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20 pr-10">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom">28</li>
                        <li class="font-12 text-white text-uppercase">Feb</li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                  <a href="#" class="btn-read-more">Read more</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix mb-sm-30 bg-silver-light">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="http://placehold.it/540x370" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20 pr-10">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom">28</li>
                        <li class="font-12 text-white text-uppercase">Feb</li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Post title here</a></h4>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis deleniti, sint assumenda. Pariatur iste veritatis excepturi, ipsa optio nobis.</p>
                  <a href="#" class="btn-read-more">Read more</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
  <!-- end main-content -->

  @endsection
  <!-- Footer -->
  @section('internal_css')
    <style>
        .bg-theme-colored-transparent {
            background-color: #10783b !important;
        }
        .btn-theme-colored {
            color: #fff !important;
            background-color: #10783b !important;
            border-color: #208c4c !important;
        }
    </style>

  @endsection
  @section('footer_js')
  <script>
    $(document).ready(function(e) {
      $(".rev_slider_default").revolution({
        sliderType:"standard",
        sliderLayout: "auto",
        dottedOverlay: "none",
        delay: 5000,
        navigation: {
          keyboardNavigation: "off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation: "off",
          onHoverStop: "off",
          touch: {
            touchenabled: "on",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
          },
          arrows: {
            style:"zeus",
            enable:true,
            hide_onmobile:true,
            hide_under:600,
            hide_onleave:true,
            hide_delay:200,
            hide_delay_mobile:1200,
            tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
            left: {
              h_align:"left",
              v_align:"center",
              h_offset:30,
              v_offset:0
            },
            right: {
              h_align:"right",
              v_align:"center",
              h_offset:30,
              v_offset:0
            }
          },
          bullets: {
            enable:true,
            hide_onmobile:true,
            hide_under:600,
            style:"metis",
            hide_onleave:true,
            hide_delay:200,
            hide_delay_mobile:1200,
            direction:"horizontal",
            h_align:"center",
            v_align:"bottom",
            h_offset:0,
            v_offset:30,
            space:5,
          }
        },
        responsiveLevels: [1240, 1024, 778],
        visibilityLevels: [1240, 1024, 778],
        gridwidth: [1170, 1024, 778, 480],
        gridheight: [550, 600, 700, 720],
        lazyType: "none",
        parallax: {
          origo: "slidercenter",
          speed: 1000,
          levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
          type: "scroll"
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "on",
        stopAfterLoops: 0,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        fullScreenAutoWidth: "off",
        fullScreenAlignForce: "off",
        fullScreenOffsetContainer: "",
        fullScreenOffset: "0",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
        }
      });
    });
  </script>
  @endsection
