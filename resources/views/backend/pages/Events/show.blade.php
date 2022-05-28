@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('events.edit',$event->id) }}" class="btn btn-primary my-2"> <i class="fa fa-edit"></i> Edit</a>
            </div>
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">Edit Event</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ asset('images/projects/events/'.$event->image) }}" alt="{{ $event->title }}">
                            </div>
                            <div class="col-md-6">
                                <h2> <strong>Title: </strong>{{ $event->title }}</h2>
                                <h5> <strong>Title: </strong>{{ $event->project->title }}</h5>
                                <h5> <strong>location: </strong> {{ $event->location }}</h5>
                                @php
                                    $tags = Str::of($event->tags)->explode(',');
                                @endphp
                                <h5> 
                                    <strong>Tags: </strong> 
                                    @foreach ($tags as $tag)
                                        <span class="badge badge-primary">{{ $tag }}</span>
                                    @endforeach
                                </h5>
                                <h5><strong>Created at: </strong> {{ $event->created_at->format('d-m-Y, h:i A') }}</h5>
                                <h5><strong>Last Update: </strong> {{ $event->updated_at->format('d-m-Y, h:i A') }}</h5>
                                <h6> <strong>Description: </strong> @php echo $event->description @endphp</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_js')
    <script>
        @if (session('success'))
                toastr.success('{{ session("success") }}','Success')
        @endif
        @if (session('error'))
            toastr.error('{{ session("error") }}','Failed')
        @endif
    </script>
@endsection
