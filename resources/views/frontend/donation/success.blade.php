@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Donation Success of {{ $donation->name }}" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Donation" />
    <meta property="og:title"               content="Donation Success || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Donation Success of {{ generalSettings()->site_title }}" />
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
                            <h2>Donation Received</h2>
                            <hr>
                            <p class="text-left ml-5 pl-5 mb-0 pb-0 text-black" style="font-size: 16px">To: <strong>{{ generalSettings()->site_title }}</strong></p>
                            <p class="text-left ml-5 pl-5 mb-0 pb-0 text-black">Address: 61 Bijoy Nagar, Dhaka-100, Bangladesh.</p>
                            <p class="text-left ml-5 pl-5 mb-0 pb-0 text-black">Transaction id: {{ $donation->transaction_id }}</p>
                            <p class="text-left ml-5 pl-5 text-black">Payment Date: {{ $donation->created_at->format('d-M-Y, h:i A') }}</p>
                            {{-- Table for Mobile screen --}}
                            <div class="table-responsive m-5 p-5 table-sm">
                                <table class="table table-bordered ">
                                    <tr>
                                        <th>Name of Donor</th>
                                        <td class="text-left">{{ $donation->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Email</th>
                                        <td class="text-left">{{ $donation->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td class="text-left">{{ $donation->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td class="text-left">{{ $donation->address }}</td>
                                    </tr>
                                    <tr>
                                        @if ($donation->project_id)
                                            <th>Project</th>
                                        @else
                                            <th>Project (Custom)</th>
                                        @endif
                                        @if ($donation->project_id)
                                            <td class="text-left">{{ $donation->project->title }}</td>
                                        @else
                                            <td class="text-left">{{ $donation->custom_project }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td class="text-left">
                                            @if ($donation->type == 1)
                                                One time Donation
                                            @else
                                                Recurring
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Amount  ({{ $donation->currency }})</th>
                                        <td class="text-left">{{ $donation->amount }}@if ($donation->currency == "BDT")৳ @endif</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td class="text-left"><span class="badge">Paid</span></td>
                                    </tr>
                                </table>
                                <h4>Thanks for Supporting us &#128151</h4>
                                <p class="text-center"><i class="fa fa-lock text-success"></i> N:B: This payment are secured by <a class="text-primary" target="_blank" href="https://www.sslcommerz.com/">SSL Commerz Payment Gateway</a>.</p>
                            </div>
                            {{-- Table for pc screen --}}
                            <div class="table-responsive m-5 p-5 table-md">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name of Donor</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Address</th>
                                            @if ($donation->project_id)
                                                <th class="text-center">Project</th>
                                            @else
                                                <th class="text-center">Project (Custom)</th>
                                            @endif
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Amount  ({{ $donation->currency }})</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $donation->name }}</td>
                                            <td>{{ $donation->email }}</td>
                                            <td class="text-left">{{ $donation->phone }}</td>
                                            <td>{{ $donation->address }}</td>
                                            @if ($donation->project_id)
                                                <td>{{ $donation->project->title }}</td>
                                            @else
                                                <td>{{ $donation->custom_project }}</td>
                                            @endif
                                            <td>
                                                @if ($donation->type == 1)
                                                    One time Donation
                                                @else
                                                    Recurring
                                                @endif
                                            </td>
                                            <td>{{ $donation->amount }}@if ($donation->currency == "BDT")৳ @endif</td>
                                            <td><span class="badge">Paid</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h4>Thanks for Supporting us &#128151</h4>
                                <p class="text-center"><i class="fa fa-lock text-success"></i> N:B: This payment are secured by <a class="text-primary" target="_blank" href="https://www.sslcommerz.com/">SSL Commerz Payment Gateway</a>.</p>
                                <a href="{{ route('frontend.donate.download',$donation->transaction_id) }}" class="btn btn-theme-colored" ><i class="fa fa-download"></i> Download</a>
                            </div>
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
            border: 10px solid #10783b;
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
