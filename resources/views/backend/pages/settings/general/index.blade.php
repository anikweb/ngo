@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">General Settings</li>
        </ol>
    </nav>
    <div class="content">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">General Settings</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('generalSetting.update',$gSettings->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" for="site_title">Site Title</td>
                                                <td>
                                                    <input type="text" name="site_title" id="site_title" value="{{ $gSettings->site_title }}"  class="form-control @error('site_title') is-invalid @enderror">
                                                    @error('site_title')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Logo</td>
                                                <td>
                                                    <img width="100px" id="logoPreview" src="{{ asset('images/generalSettings/'.generalSettings()->logo) }}" alt="{{ $gSettings->logo }}">
                                                    <label for="logo" class="ml-5 btn btn-success" style="font-weight:200">
                                                      <i class="fa fa-edit"></i> Change
                                                    </label>
                                                    <input type="file" style="display: none" name="logo" class="@error('logo') is-invalid @enderror" id="logo" onchange="document.getElementById('logoPreview').src = window.URL.createObjectURL(this.files[0])">
                                                    @error('logo')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Icon</td>
                                                <td>
                                                    <img id="iconPreview" width="50px" src="{{ asset('images/generalSettings/'.generalSettings()->icon) }}" alt="{{ $gSettings->icon }}">
                                                    <input type="file" id="icon" style="display: none" name="icon" class="@error('icon') is-invalid @enderror" onchange="document.getElementById('iconPreview').src = window.URL.createObjectURL(this.files[0])">
                                                    <label for="icon" class="ml-5 btn btn-success" style="font-weight:200">
                                                        <i class="fa fa-edit"></i> Change
                                                    </label>
                                                    @error('icon')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Tagline</td>
                                                <td>
                                                    <input type="text" name="tagline" id="tagline" value="{{ $gSettings->tagline }}"  class="form-control @error('tagline') is-invalid @enderror">
                                                    @error('tagline')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Adminastration Email</td>
                                                <td>
                                                    <input type="text" name="admin_email" id="admin_email" value="{{ $gSettings->admin_email }}"  class="form-control @error('admin_email') is-invalid @enderror">
                                                    @error('admin_email')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Membership</td>
                                                <td>
                                                    <input type="checkbox" name="membership" id="membership" value="2">
                                                    <label for="membership">Anyone can register</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">New User Default Role</td>
                                                <td>
                                                    <select name="new_user_role" id="new_user_role" class="form-control @error('new_user_role') is-invalid @enderror">
                                                        <option value="subscriber">Subscriber</option>
                                                        <option value="editor">Editor</option>
                                                    </select>
                                                    @error('new_user_role')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Timezone</td>
                                                <td>
                                                    <select name="timezone" id="timezone" class="form-control @error('timezone') is-invalid @enderror">
                                                        <option value="Asia/Dhaka">Asia/Dhaka</option>
                                                    </select>
                                                    @error('timezone')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Date Format</td>
                                                <td>
                                                    <select name="date_format" id="" class="form-control @error('date_format') is-invalid @enderror">
                                                        <option value="dd/mm/yyyy">dd/mm/yyyy</option>
                                                        <option value="dd/mm/yy">dd/mm/yy</option>
                                                        <option value="yyyy/mm/dd">yyyy/mm/dd</option>
                                                        <option value="yy/mm/dd"></option>
                                                    </select>
                                                    @error('date_format')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Time Format</td>
                                                <td>
                                                    <select name="time_format" id="" class="form-control @error('time_format') is-invalid @enderror">
                                                        <option value="12">12 hour</option>
                                                        <option value="24">24 hour</option>
                                                    </select>
                                                    @error('time_format')
                                                        <div class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Change</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
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
