@extends('frontend.master')

@section('og_meta')
<meta property="description"        content="Team || {{ generalSettings()->site_title }}" />
    <meta property="og:url"                content="{{ url()->current() }}" />
    <meta property="og:type"               content="Team" />
    <meta property="og:title"              content="Team" />
    <meta property="og:description"        content="Team || {{ generalSettings()->site_title }}" />
    <meta property="og:image"              content="{{ asset('images/about/'.about()->image) }}" />
@endsection
@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    {{-- <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title text-white">Advisers</h3>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="">{{ Str::upper('Our Active Official Members') }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Volunteer -->
    <section>
        <div class="container pb-30">
            <div class="section-content">
                <div class="row">
                    @foreach ($officialTeam as $item)
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-30">
                            <div class="team-member">
                                <div class="volunteer-thumb">
                                    @if ($item->image)
                                        <img src="{{ asset('images/official_team/'.$item->image) }}" alt="{{ $item->name }}" class="img-fluid img-responsive" style="height: 400px; width:400px">
                                    @else
                                        <img src="{{ asset('images/placeholder/image.jpg') }}" alt="{{ $item->name }}" class="img-fluid img-responsive" style="height: 400px; width:400px">
                                    @endif
                                </div>
                                <div class="bg-white text-center pt-20 pb-20">
                                    <div class="member-biography">
                                        <h3 class="mt-0">{{ $item->name }}</h3>
                                        <p>{{ $item->designation }}</p>
                                    </div>
                                    <ul class="styled-icons icon-theme-colored icon-sm icon-bordered pt-5">
                                        @if ($item->email)
                                            <li><a title="E-mail" target="_blank" href="mailto:{{ $item->email }}"><i class="fa fa-envelope"></i></a></li>
                                        @endif
                                        @foreach ($item->officialTeamSocial as $items)
                                            <li><a target="_blank" title="{{ Str::title($items->platform->name) }}" href="{{ 'https://'.$items->platform->url.'/'.$items->username }}"><i class="{{Str::replace('fab', 'fa', $items->platform->icon)}}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection
