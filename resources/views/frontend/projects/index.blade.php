@extends('frontend.master')
@section('content')
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('images/projects/'.$project->featured_image) }}">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title text-white">{{ $project->title }}</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container pt-sm-30">
        <div class="section-content">
          <div class="row">
            <div class="col-md-7 mb-sm-40">
              <h3 class="pb-10">{{ $project->title }}</h3>
              @php echo $project->description @endphp
              <a href="#" class="btn btn-default btn-md mt-20">Join Now</a>
            </div>
            <div class="col-md-5">
              <div class="owl-carousel-1col" data-nav="true">
                <div class="item">
                  <img src="images/1.jpg" alt="">
                </div>
                <div class="item">
                  <img src="images/2.jpg" alt="">
                </div>
                <div class="item">
                  <img src="images/3.jpg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Divider call -->
    <section class="divider layer-overlay overlay-theme-colored" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="call-to-action">
            <div class="col-md-9">
              <h2 class="text-white font-opensans font-30 mt-0 mb-5">Please raise your hand</h2>
              <h3 class="text-white font-opensans font-18 mt-0">for those helpless childrens who need it</h3>
            </div>
            <div class="col-md-3 mt-30">
              <a href="#" class="btn btn-default btn-circled btn-lg">Become a Fundraiser</a>
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
              <h2 class="mt-0">Current Campaign</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nostrum corporis qui ut nesciunt voluptatibus excepturi eum quod facere et earum quas<br> explicabo rem est Odit animi ipsam quo ad culpa in officiis qui voluptatem doloremque voluptatum nam.</p>
            </div>
          </div>
          <div class="row mt-30">
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-lighter mb-30">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="http://placehold.it/470x320">
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                  <h4 class="title mt-0"><a href="#">sInvesting in Childhood</a></h4>
                  <div class="clearfix"></div>
                  <p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi! Sed nisi perferendis, totam harum dicta.</p>
                  <div class="mt-10">
                   <a href="#" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-lighter mb-30">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="http://placehold.it/470x320">
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                  <h4 class="title mt-0"><a href="#">Investing in Childhood</a></h4>
                  <div class="clearfix"></div>
                  <p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi! Sed nisi perferendis, totam harum dicta.</p>
                  <div class="mt-10">
                   <a href="#" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-lighter mb-30">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="http://placehold.it/470x320">
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                  <h4 class="title mt-0"><a href="#">Investing in Childhood</a></h4>
                  <div class="clearfix"></div>
                  <p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi! Sed nisi perferendis, totam harum dicta.</p>
                  <div class="mt-10">
                   <a href="#" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-lighter mb-30">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="http://placehold.it/470x320">
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                  <h4 class="title mt-0"><a href="#">Investing in Childhood</a></h4>
                  <div class="clearfix"></div>
                  <p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi! Sed nisi perferendis, totam harum dicta.</p>
                  <div class="mt-10">
                   <a href="#" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-lighter mb-30">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="http://placehold.it/470x320">
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                  <h4 class="title mt-0"><a href="#">Investing in Childhood</a></h4>
                  <div class="clearfix"></div>
                  <p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi! Sed nisi perferendis, totam harum dicta.</p>
                  <div class="mt-10">
                   <a href="#" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="schedule-box maxwidth500 bg-lighter mb-30">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="http://placehold.it/470x320">
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                  <h4 class="title mt-0"><a href="#">Investing in Childhood</a></h4>
                  <div class="clearfix"></div>
                  <p class="mt-10">Lorem ipsum dolor sit amet elit. Cum veritatis sequi nulla nihil, dolor voluptatum nemo adipisci eligendi! Sed nisi perferendis, totam harum dicta.</p>
                  <div class="mt-10">
                   <a href="#" class="btn btn-theme-colored btn-sm mt-10">Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

@endsection
