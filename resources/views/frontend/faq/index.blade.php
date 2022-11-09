@extends('frontend.master')
@section('og_meta')
<meta name="description"                content="Frequently asked questions of {{ generalSettings()->site_title }}" />
    <meta property="og:url"                 content="{{ url()->current() }}" />
    <meta property="og:type"                content="Frequently asked questions" />
    <meta property="og:title"               content="Frequently asked questions || {{ generalSettings()->site_title }}" />
    <meta property="og:description"         content="Frequently asked questions of {{ generalSettings()->site_title }}" />
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
              <h3 class="title text-white">frequently asked questions
            </h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- main section  --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="accordion1" class="panel-group accordion">
                        @foreach ($faqs as $faq)
                            @if ($loop->index == 0)
                                <div class="panel">
                                    <div class="panel-title">
                                        <a data-parent="#accordion1" data-toggle="collapse" href="#accordion{{$loop->index}}" class="active" aria-expanded="true"> <span class="open-sub"></span> <strong>{{ $faq->question }}</strong></a>
                                    </div>
                                        <div id="accordion{{$loop->index}}" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                                        <div class="panel-content">
                                            <h4 class="mt-0 pt-0"><strong>Answer:</strong></h4>
                                            <p>{{ $faq->answer }}</p>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="panel">
                                    <div class="panel-title">
                                        <a class="collapsed" data-parent="#accordion1" data-toggle="collapse" href="#accordion{{$loop->index+1}}" aria-expanded="false"> <span class="open-sub"></span> <strong>{{ $faq->question }}</strong></a>
                                    </div>
                                    <div id="accordion{{$loop->index+1}}" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-content">
                                            <h4 class="mt-0 pt-0"><strong>Answer:</strong></h4>
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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
