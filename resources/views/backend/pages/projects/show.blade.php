@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url()->previous(); }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-12 pt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $project->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img style="width:800px; height:460px;" id="image_preview" class="img-fluid d-block" src="{{ asset('images/projects/'.$project->featured_image) }}" alt="{{ $project->title }}">
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <h2><strong>Title:</strong> <span>{{ $project->title }}</span></h2>
                                </div>
                                <div>
                                    <h5><strong>Description: </strong><span>@php echo $project->description @endphp </span></h5>
                                </div>
                                <div>
                                    <h6><strong>Created at: </strong><span>{{ $project->created_at->format('d-m-y, h:i A')  }}</span></h6>
                                </div>
                                <div>
                                    <h6><strong>Updated at: </strong><span>{{ $project->updated_at->format('d-m-y, h:i A')  }}</span></h6>
                                </div>
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
    @if(session('success'))
        toastr["success"]("{{ session('success') }}")
    @elseif(session('error'))
        toastr["error"]("{{ session('error') }}")
    @endif
</script>
@endsection
