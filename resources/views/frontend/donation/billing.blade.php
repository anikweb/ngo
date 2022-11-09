@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Donation Confirmation" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Donation" />
    <meta property="og:title"               content="Donation Confirmation || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Donation Confirmation of {{ generalSettings()->site_title }}" />
    <meta property="og:image"               content="{{ asset('images/about/'.$about->image) }}" />
@endsection
@section('content')
<div class="main-content">
    {{-- main section  --}}
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-donation-detail">
                        <div class="card-header bg-theme-colored ">
                            <h3 class="text-white mt-0 p-5">Your Donation Details
                                <span type="button" class="close">
                                    <span aria-hidden="true">
                                        <i class="fa fa-money mr-5 mt-4 pb-5" style="font-size: 40px; color:white" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <h3>Amount: <strong>{{ $donateAmount  }}৳ ‍(BDT)</strong></h3>
                            @isset($donateProject->title)<h4>Donate for (Project): <strong> {{ $donateProject->title }}</strong>  </h4> @endisset
                            @isset($customProject)<h4>Donate for (Custom Project): <strong> {{ $customProject }} </strong>  </h4>@endisset
                            @isset($donateComment) <p>Comment: <strong>{{ $donateComment }}</strong> </p>@endisset
                            <a href="{{ route('frontend') }}"><span class="text-danger">Cancel</span> <span class="text-primary">and return into Homepage</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-theme-colored ">
                            <h2 class="text-white mt-0 p-5">Your Details
                                <span type="button" class="close">
                                    <span aria-hidden="true">
                                        <i class="fa fa-credit-card mr-5 mt-4 pb-5" style="font-size: 40px; color:white" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </h2>
                        </div>
                        <div class="card-body text-left p-5 m-5 mx-5 mt-5">
                            <div class="card-details  mt-0">
                                <h4 class="m-0 p-0">Amount: <strong>{{ $donateAmount }}৳ ‍(BDT)</strong></h3>
                                @isset($donateProject->title)<p>Donate for (Project): <strong> {{ $donateProject->title }}</strong>  </h4> @endisset
                                @isset($customProject)<h4>Donate for (Custom Project): <strong> {{ $customProject }} </strong>  </h4>@endisset
                            </div>
                            <form action="{{route('ssl.pay')}}" method="POST">
                                @csrf
                                @isset($donateProject->title)
                                    <input type="hidden" name="project" value="{{ $donateProject->id }}">
                                @else
                                    <input type="hidden" name="projectCustom" value="{{ $customProject }}">
                                @endisset
                                <input type="hidden" name="amount" value="{{$donateAmount}}">
                                <input type="hidden" name="comment" value="{{ $donateComment }}">
                                <input type="hidden" name="currency" value="BDT">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
                                    @error('name')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                                    @error('email')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact Number <span class="text-danger">*</span></label>
                                    <input type="tel" value="{{ old('contact') }}" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" placeholder="Enter your contact number">
                                    @error('contact')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" value="{{ old('address') }}" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter your full address">
                                    @error('address')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="terms" id="termsLabel">
                                    <input type="checkbox" name="terms" id="terms" value="accepted">
                                    I have read and agree to the <a href="{{ route('frontend.terms.index') }}" class="text-danger" target="_blank"><u>Terms & Conditions</u></a>, <a href="{{ route('frontend.refund.index') }}" class="text-danger" target="_blank"><u>Refund Policy</u></a> and <a href="{{ route('frontend.privacy.index') }}" class="text-danger" target="_blank"><u>Privacy & Policy</u></a>.</label>
                                    <button
                                        onclick="myFunction()"
                                        class="btn btn-submit btn-theme-colored btn-lg"
                                        style="font-weight:500; display:block; width:100%">
                                        Proceed to Payment
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </button>
                                </div>
                            </form>
                            <p class="text-center"><i class="fa fa-lock text-success"></i> N:B: This payment are secured by <a class="text-primary" target="_blank" href="https://www.sslcommerz.com/">SSL Commerz Payment Gateway</a>.</p>
                        </div>
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
        #donate_form{

            padding: 10px;
        }
        .card{
            box-shadow: 0 0 10px #dddddd;
            padding-bottom: inherit !important;
            border-radius: 10px;

        }

        @media only screen and (min-width : 320px) {
            .container-fluid{
                width: 100%;
            }
        }
        @media only screen and (min-width : 768px) {
            .container-fluid{
                width: 80%;
            }
        }
    </style>
@endsection
@section('footer_js')
    <script>
        $('.fa-spinner').hide();
        $('.btn-submit').attr('disabled','');
        $('.btn-submit').click(function(){
            $('.fa-spinner').show();
        });
        $('#termsLabel').click(function(event){
            if($('#terms').is(':checked') == true){
                $('.btn-submit').removeAttr('disabled');
            }else{
                $('.btn-submit').attr('disabled','');
            }
        });
    </script>
@endsection

