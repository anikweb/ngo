@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Bank Information" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Bank Information" />
    <meta property="og:title"               content="Bank Information of || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Bank Information {{ generalSettings()->site_title }}" />
    <meta property="og:image"               content="{{ asset('images/about/'.$about->image) }}" />
@endsection
@section('content')
<div class="main-content">
    {{-- main section  --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-theme-colored ">Pay with Bank</h2>
                    <div class="card">
                        <div class="service-icon bg-white">
                            <img class="ncc" src="{{ asset('images/donation/service-provider/nccbank.png') }}" alt="ncc bank logo">
                        </div>
                        <div class="card-header">
                           <h2 class="text-white">National Credit and Commerce Bank Limited</h2>
                           <h4><strong class="text-white"><i class="fa fa-money" aria-hidden="true"></i> A/C NAME: Muktir Bondhon Foundation</strong></h4>
                           <h4><strong class="text-white"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> A/C NO: 0057-0325000747</strong></h4>
                           <h4><strong class="text-white"><i class="fa fa-codepen" aria-hidden="true"></i></i> ROUTING NO: 160271090</strong></h4>
                           <h4><strong class="text-white"><i class="fa fa-codepen" aria-hidden="true"></i></i> SWIFT CODE: NCCLBDDH</strong></h4>
                           <h4><strong class="text-white"><i class="fa fa-map-marker" aria-hidden="true"></i> BRANCHES: Bijoy Nagar, Dhaka, Bangladesh</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-theme-colored ">Pay with Mobile Banking</h2>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="service-icon bg-white">
                            <img class="bkash" src="{{ asset('images/donation/service-provider/bkash_logo.png') }}" alt="bkash logo">
                        </div>
                        <div class="card-header">
                           <h2 class="text-white">Bkash</h2>
                           <h4 class="m-0 p-0"><strong class="text-white"><i class="fa fa-money" aria-hidden="true"></i> A/C TYPE: Merchant</strong></h4>
                           <h4 class="m-0 p-0"><strong class="text-white"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> A/C NO: 01797-397296</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="service-icon bg-white">
                            <img class="bkash" src="{{ asset('images/donation/service-provider/bkash_logo.png') }}" alt="bkash logo">
                        </div>
                        <div class="card-header">
                           <h2 class="text-white">Bkash</h2>
                           <h4 class="m-0 p-0"><strong class="text-white"><i class="fa fa-money" aria-hidden="true"></i> A/C TYPE: Personal</strong></h4>
                           <h4 class="m-0 p-0"><strong class="text-white"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> A/C NO: 01572-058620</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="service-icon bg-white">
                            <img class="nagad" src="{{ asset('images/donation/service-provider/nagad.png') }}" alt="nagad logo">
                        </div>
                        <div class="card-header">
                           <h2 class="text-white">Bkash</h2>
                           <h4 class="m-0 p-0"><strong class="text-white"><i class="fa fa-money" aria-hidden="true"></i> A/C TYPE: Personal</strong></h4>
                           <h4 class="m-0 p-0"><strong class="text-white"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> A/C NO: 01736-151015</strong></h4>
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
    .card{
        background: #10783b;  /* fallback for old browsers */
        border-radius: 10px 10px 10px 10px;
        transition: all .3s linear;
        transform: scale(.9);
        position: relative;
        padding-bottom: 70px;
    }
    .card:hover{
        transform: scale(1);
        -webkit-transform: scale(1);
    }
    .card::before{
       background: white;
       width: 10px;
       height: 10px;
       position: absolute;
       top: -55px;
    }
    .card-body{
        background: white !important;
    }
    .service-icon{
        width: 134px;
        height: 125px;
        margin: 0 auto;
        border-radius: 0px 0px 70px 70px;
        box-shadow: 0px 13px #0000002b;
    }
    .service-icon .ncc{
        width: 81px;
        height: 96px;
        margin: 50;
    }
    .service-icon .bkash{
        padding: 30px 8px;
    }
</style>
@endsection
