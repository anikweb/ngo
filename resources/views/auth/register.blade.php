@extends('frontend.master')
@section('content')
    <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6" data-bg-img="http://placehold.it/1920x1280" style="background-image: url(&quot;http://placehold.it/1920x1280&quot;); background-position: 50% 60px;">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="font-28 text-white">Register</h3>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="{{route('frontend')}}">Home</a></li>
                <li class="active text-theme-colored">Register</li>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section>
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form name="reg-form" class="register-form" action="{{route('register')}}" method="post">
                    @csrf
                    <div class="icon-box mb-0 p-0">
                    <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                        <i class="pe-7s-users"></i>
                    </a>
                    <h4 class="text-gray pt-10 mt-0 mb-30">Don't have an Account? Register Now.</h4>
                    </div>
                    <hr>
                    <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>
                    <div class="row">
                    <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        <input name="name" value="{{old('name')}}" id="name" class="form-control" @error('name') style="border:1px solid red" @enderror type="text" placeholder="Enter you name">
                        @error('name')
                            <div class="text-danger">
                                <i class="fa fa-exclamation-circle"></i>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email Address</label>
                        <input name="email" id="email" value="{{old('email')}}" placeholder="Enter your email" @error('email') style="border:1px solid red" @enderror class="form-control" type="text">
                        @error('email')
                            <div class="text-danger">
                                <i class="fa fa-exclamation-circle"></i>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Choose Password</label>
                            <input id="password" name="password" value="{{old('password')}}" class="form-control" @error('password') style="border:1px solid red" @enderror type="password" placeholder="Enter your password">
                            @error('password')
                                <div class="text-danger">
                                    <i class="fa fa-exclamation-circle"></i>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Re-enter Password</label>
                        <input id="password_confirmation" name="password_confirmation"  @error('password_confirmation') style="border:1px solid red" @enderror class="form-control" type="password" placeholder="Retype your password!">
                        @error('password_confirmation')
                            <div class="text-danger">
                                <i class="fa fa-exclamation-circle"></i>
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">Register Now</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
