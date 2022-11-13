@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Donation of {{ generalSettings()->site_title }}" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Donation" />
    <meta property="og:title"               content="Donation || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Donation of {{ generalSettings()->site_title }}" />
    <meta property="og:image"               content="{{ asset('images/about/'.$about->image) }}" />
@endsection
@section('content')
<div class="main-content">
    {{-- main section  --}}
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>Make Donation</h2>
                    <p class="lead">Select currency on the buttons inside the tabbed menu.</p>


                    <div class="tab">
                        <button class="tablinks active" onclick="openCurrency(event, 'taka')">৳TAKA (BDT)</button>
                        {{-- <button class="tablinks" onclick="openCurrency(event, 'dollar')">$DOLLAR (USD)</button> --}}
                    </div>

                    <div id="taka" class="tabcontent" style="display:block">
                        <form id="donate_form" action="{{ route('frontend.donate.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-20">
                                <label>
                                    <strong>I Want to Donate for <span>*</span></strong>
                                </label>
                                <select class="form-control" id="selects" name="project" style="font-weight: 600">
                                    <option value="" class="custom-project">Select</option>
                                    @foreach ($projects as $project)
                                        <option @isset($projectSlug) @if ($projectSlug->slug == $project->slug) selected @endif @endisset value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach

                                    <option value="custom_projectValue" class="custom-project">Custom</option>
                                </select>
                                <div id="project-error-msg">

                                </div>
                                <div id="custom-project-input">
                                    <label><strong>Custom Project: <span>*</span></strong></label>
                                </div>
                            </div>

                            <div class="form-group mb-20 py">
                                <label>
                                    <strong>How much do you want to donate? <span>*</span></strong>
                                </label>
                                <div class="radio mt-5" style="padding-left:20px;font-weight: 600">
                                    <label class="radio-inline">
                                        <input type="radio" class="option-input radio"  name="amount" value="100">৳100
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="option-input radio" name="amount" value="500">৳500
                                        </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="option-input radio" name="amount" value="1000">৳1,000
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="option-input radio" name="amount" value="5000">৳5,000
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="option-input radio" name="amount" value="10000">৳10,000
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="option-input radio" name="amount" value="customAmountValue">Custom Amount
                                    </label>
                                </div>
                                <div id="custom_other_amount" style="display: none;">
                                    <label><strong>Custom Amount: <span>*</span></strong></label>
                                </div>
                                <div id="amount-error-msg">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment <em style="font-weight:500">(optional)</em></label>
                                <textarea style="font-weight: 600" class="form-control" name="comment"  id="comment" rows="3" placeholder="Write Something"></textarea>
                            </div>
                            <label for="terms" id="termsLabel">
                            <input type="checkbox" name="terms" id="terms" value="accepted">
                                    I have read and agree to the <a href="{{ route('frontend.terms.index') }}" class="text-danger" target="_blank"><u>Terms & Conditions</u></a>, <a href="{{ route('frontend.refund.index') }}" class="text-danger" target="_blank"><u>Refund Policy</u></a> and <a href="{{ route('frontend.privacy.index') }}" class="text-danger" target="_blank"><u>Privacy & Policy</u></a>.</label>
                            <button
                            type="submit"
                            class=" btn-submit btn btn-theme-colored"
                            style="width: 100%;">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                Pay With Card / Mobile Banking / Bank
                                <i class="fa fa-spinner fa-spin"></i>
                            </button>
                        </form>
                        <p class="text-center"><i class="fa fa-lock text-success"></i> N:B: This payment are secured by <a class="text-primary" target="_blank" href="https://www.sslcommerz.com/">SSL Commerz Payment Gateway</a>.</p>
                    </div>

                    {{-- <div id="dollar" class="tabcontent">
                        <h3>Paris</h3>
                        <p>Paris is the capital of France.</p>
                    </div> --}}
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

        /* change border radius for the tab , apply corners on top*/

        #exTab3 .nav-pills > li > a {
        border-radius: 4px 4px 0 0 ;
        }
        #exTab3 .tab-content {
        color : white;
        padding : 5px 15px;
        }
        /* Style the tab */
        .tab {
            overflow: hidden;
            background-color: #10783b;;
            border-left: 10px solid #10783b;
            border-top: 10px solid #10783b;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: #fff;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #fff;
        color:#000;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #fff;
        color:#000;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 10px solid #10783b;
        border-top: none;
        }
        .dpx{
        display:flex;
        align-items:center;
        justify-content:space-around;
        }
        .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 13.33333px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 20px;
        width: 20px;
        transition: all 0.15s ease-out 0s;
        background: #929090;
        border: 2px solid black;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
        }
        .option-input:hover {
        background: #10783b9f;
        }
        .option-input:checked {
        background: #10783b;
        }

        .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #10783b;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
        }
        .option-input.radio {
        border-radius: 50%;
        }
        .option-input.radio::after {
        border-radius: 50%;
        }
        .checkbox label, .radio label{

            min-height: 0;
            padding-left: 2px;
            margin-bottom: 0;
            font-weight: inherit;
            cursor: pointer;
            padding-top: 14px;
            padding-right: 25px;
        }
        #donate_form{

            padding: 10px;
        }

        @keyframes click-wave {
        0% {
            height: 40px;
            width: 40px;
            opacity: 0.35;
            position: relative;
        }
        100% {
            height: 200px;
            width: 200px;
            margin-left: -80px;
            margin-top: -80px;
            opacity: 0;
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
        function openCurrency(evt, currencyName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(currencyName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        $(document).ready(function(e) {
            var $custom_other_amount = $("#custom_other_amount");
            $custom_other_amount.hide();
            $("#donate_form [name='amount']").change(function() {
                var $this = $(this);
                if ($this.val() == 'customAmountValue') {
                    $custom_other_amount.show().append('<div class="input-group"><span class="input-group-addon bg-theme-colored text-white">৳</span> <input type="text" name="amountCustom" class="form-control" placeholder="Enter Amount"/></div>');
                }
                else{
                    $custom_other_amount.children( ".input-group" ).remove();
                    $custom_other_amount.hide();
                }
            });

            // custom Project
            var $custom_project = $("#custom-project-input");
            $custom_project.hide();

            $("#donate_form [name='project']").change(function() {
                var $this = $(this);
                if ($this.val() == 'custom_projectValue') {
                    $custom_project.show().append('<div class="input-group" style="width:100%"><input type="text" name="projectCustom" class="form-control" placeholder="Enter Custom Project"/></div>');
                }
                else{
                    $custom_project.children( ".input-group" ).remove();
                    $custom_project.hide();
                }
            });
        });
    </script>
    @if(session('formErrors'))
        @foreach (session('formErrors') as $item)
            @if ($item == 'The amount field is required.')
                <script>
                    $(document).ready(function(e) {
                        $('#amount-error-msg').html('<span class="text-danger"><i class="fa fa-exclamation-circle"></i> Amount is Required.</span>');
                    });
                </script>
            @endif
            @if ($item == 'The amount custom field is required.')
                <script>
                    $(document).ready(function(e) {
                        $('#amount-error-msg').html('<span class="text-danger"><i class="fa fa-exclamation-circle"></i> Amount is Required.</span>');
                    });
                </script>
            @endif
            @if ($item == 'The amount custom must be an integer.')
                <script>
                    $(document).ready(function(e) {
                        $('#amount-error-msg').html('<span class="text-danger"><i class="fa fa-exclamation-circle"></i> Amount is Required.</span>');
                    });
                </script>
            @endif

            @if ($item == 'The project field is required.')
                <script>
                    $(document).ready(function(e) {
                        $("#selects").attr('style','font-weight:600; border:1px solid #a94442');
                        $('#project-error-msg').html('<span class="text-danger"><i class="fa fa-exclamation-circle"></i> You need to Select a project.</span>');
                    });
                </script>
            @endif
            @if ($item == 'The project custom field is required.')
                <script>
                    $(document).ready(function(e) {
                        $("#selects").attr('style','font-weight:600; border:1px solid #a94442');
                        $('#project-error-msg').html('<span class="text-danger"><i class="fa fa-exclamation-circle"></i> You need to Select a project.</span>');
                    });
                </script>
            @endif
            @if ($item == 'The project custom must not be greater than 50 characters.')
                <script>
                    $(document).ready(function(e) {
                        $("#selects").attr('style','font-weight:600; border:1px solid #a94442');
                        $('#project-error-msg').html('<span class="text-danger"><i class="fa fa-exclamation-circle"></i> Custom project must not be greater than 50 characters.</span>');
                    });
                </script>
            @endif
            {{ $item }}
        @endforeach
    @endif
@endsection
