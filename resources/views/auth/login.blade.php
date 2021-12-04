@extends('frontend.master')
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-dark-6" data-bg-img="http://placehold.it/1920x1280" style="background-image: url(&quot;http://placehold.it/1920x1280&quot;); background-position: 50% 59px;">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28 text-white">My Account</h3>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="{{ route('frontend') }}">Home</a></li>
                            <li class="active text-theme-colored">Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h4 class="text-gray mt-0 pt-5"> Login</h4>
                    <hr>
                    {{--  <p>Lorem ipsum dolor sit amet, consectetur elit.</p>  --}}
                    <form name="login-form" class="clearfix"  action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" type="text">
                                @error('email')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                <input id="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" type="text">
                                @error('password')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="checkbox pull-left mt-15">
                            <label for="remember">
                            <input id="remember" name="remember" type="checkbox">
                            Remember me </label>
                        </div>
                        <div class="form-group pull-right mt-10">
                            <button type="submit" class="btn btn-dark btn-sm">Login</button>
                        </div>
                        <div class="clear text-center pt-10">
                            <a class="text-theme-colored font-weight-600 font-12" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>
                        <div class="clear text-center pt-10">
                            <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998">Login with facebook</a>
                            <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee">Login with twitter</a>
                        </div>
                    </form>
                    <a href="{{ route('register') }}">register </a>
                </div>
            </div>
        </div>
    </section>
@endsection
