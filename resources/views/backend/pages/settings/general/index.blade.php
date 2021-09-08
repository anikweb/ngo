@extends('backend.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
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
                                <form action="{{ route('generalSetting.store') }}" method="POST">
                                    @csrf
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Site Title</td>
                                                <td>
                                                    <input type="text" name="" id="" value="Muktir Bondhon Foundation"  class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Logo</td>
                                                <td>
                                                    <img width="80px" src="{{ asset('assets/images/preloaders/13.png') }}" alt="">
                                                    <button class="btn btn-success ml-5"><i class="fa fa-edit"></i> Change</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Icon</td>
                                                <td>
                                                    <img width="50px" src="{{ asset('assets/images/preloaders/13.png') }}" alt="">
                                                    <button class="btn btn-success ml-5"><i class="fa fa-edit"></i> Change</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Tagline</td>
                                                <td>
                                                    <input type="text" name="" id="" value="We are the best NGO Company" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Adminastration Email</td>
                                                <td>
                                                    <input type="email" name="" id="" value="admin@muktirbondhon.org" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Membership</td>
                                                <td>
                                                    <input type="checkbox" name="" id="membership" value="membership">
                                                    <label for="membership">Anyone can register</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">New User Default Role</td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">-Select-</option>
                                                        <option value="">Subscriber</option>
                                                        <option value="">Editor</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Timezone</td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Asia/Dhaka</option>
                                                        <option value="">Editor</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Date Format</td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">dd/mm/yyyy</option>
                                                        <option value="">dd/mm/yy</option>
                                                        <option value="">yyyy/mm/dd</option>
                                                        <option value="">yy/mm/dd</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  class="font-weight-bold">Time Format</td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">12 hour</option>
                                                        <option value="">24 hour</option>
                                                    </select>
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
