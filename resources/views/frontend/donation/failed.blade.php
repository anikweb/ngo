@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Donation Failed" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Donation" />
    <meta property="og:title"               content="Donation Failed || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Donation Failed of {{ generalSettings()->site_title }}" />
    <meta property="og:image"               content="{{ asset('images/about/'.$about->image) }}" />
@endsection
@section('content')
<div class="main-content">
    {{-- main section  --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $cause }}</h2>
                            <hr>
                            <p>We regret to inform you that your donation was not successful.</p>
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
        th{
            background: #10783b;
            color: #fff;
            width: 200px
        }
        .badge{
            background: #10783b;
        }
        .text-black{
            color:black;
        }
        .card{
            border: 10px solid #b30404;
        }
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

