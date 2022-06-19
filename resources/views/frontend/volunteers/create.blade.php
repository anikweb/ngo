@extends('frontend.master')
@section('content')
<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-dark" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <h2 class="text-theme-colored font-36">Become a Volunteer</h2>
              <ol class="breadcrumb text-center mt-10 white">
                <li><a href="{{ route('frontend') }}">Home</a></li>
                <li class="active">Become a Volunteer</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Features -->
    {{-- <section class="bg-lighter">
      <div class="container">
        <div class="section-content">
          <div class="row mtli-row-clearfix">
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="icon-box text-center p-10">
                <a href="#" class="icon icon-gray icon-bordered icon-rounded icon-border-effect effect-rounded mb-10">
                  <i class="fa fa-user-plus font-30 text-theme-colored"></i>
                </a>
                <h4 class="icon-box-title"><a href="#">Create an account</a></h4>
                <p class="text-gray">Lorem ipsum dolor sit amet consecte adipisicing elit. Molestias nnulla placeat, odioqui dict</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="icon-box text-center p-10">
                <a href="#" class="icon icon-gray icon-bordered icon-rounded icon-border-effect effect-rounded mb-10">
                  <i class="fa fa-magic font-30 text-theme-colored"></i>
                </a>
                <h4 class="icon-box-title"><a href="#">Join to a new campaign</a></h4>
                <p class="text-gray">Lorem ipsum dolor sit amet consecte adipisicing elit. Molestias nnulla placeat, odioqui dict</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="icon-box text-center p-10">
                <a href="#" class="icon icon-gray icon-bordered icon-rounded icon-border-effect effect-rounded mb-10">
                  <i class="fa fa-globe font-30 text-theme-colored"></i>
                </a>
                <h4 class="icon-box-title"><a href="#">Discover</a></h4>
                <p class="text-gray">Lorem ipsum dolor sit amet consecte adipisicing elit. Molestias nnulla placeat, odioqui dict</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="icon-box text-center p-10">
                <a href="#" class="icon icon-gray icon-bordered icon-rounded icon-border-effect effect-rounded mb-10">
                  <i class="fa fa-life-ring font-30 text-theme-colored"></i>
                </a>
                <h4 class="icon-box-title"><a href="#">Support</a></h4>
                <p class="text-gray">Lorem ipsum dolor sit amet consecte adipisicing elit. Molestias nnulla placeat, odioqui dict</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="heading-line-bottom mt-0 mb-30">
              <h3 class="heading-title">Become a Volunteer</h3>

            </div>
            <h5><span class="text-danger">*</span> marked field must be met.</h5>

            <form id="volunteer_apply_form" action="{{route('frontend.volunteer.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_en">Name (English) <span class="text-danger">*</span></label>
                            <input id="name_en" name="name_en" type="text" placeholder="Enter Name(English)" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_bn">নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input id="name_bn" name="name_bn" type="text" placeholder="বাংলায় আপনার নাম লিখুন"  class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" name="email" class="form-control  email" type="email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                            <input id="mobile" name="mobile" class="form-control" type="text" placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="father_name">Father's Name </label>
                            <input id="father_name" name="father_name" class="form-control" type="text" placeholder="Enter Father's Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="mother_name">Mother's Name </label>
                            <input id="mother_name" name="mother_name" class="form-control" type="text" placeholder="Enter Mother's Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="blood_group">Blood Group </label>
                            <select name="blood_group" id="blood_group" class="form-control">
                                <option value="a+">A+</option>
                                <option value="o+">O+</option>
                                <option value="b+">B+</option>
                                <option value="ab+">AB+</option>
                                <option value="a-">A-</option>
                                <option value="o-">O-</option>
                                <option value="b-">B-</option>
                                <option value="ab-">AB-</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sex">Sex <span class="text-danger">*</span></label>
                            <select name="sex" id="sex" class="form-control">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">3rd Gender</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nid">National Identity Number (NID) </label>
                            <input type="text" class="form-control" name="nid" id="nid" placeholder="Enter National Identity Nummber (NID)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="bcn">Birth Certification Number</label>
                            <input type="text" class="form-control" name="bcn" id="bcn" placeholder="Enter Birth Certification Number">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <select name="nationality" disabled id="nationality" class="form-control">
                                <option value="bangladeshi">Bangladeshi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <select name="occupation" id="occupation" class="form-control">
                                <option value="">-Select-</option>
                                <option value="banker">Banker</option>
                                <option value="business">Business</option>
                                <option value="doctor">Doctor</option>
                                <option value="entrepreneur">Entrepreneur</option>
                                <option value="farmer">Farmer</option>
                                <option value="government_job">Government Job</option>
                                <option value="nurse">Nurse</option>
                                <option value="private_job">Private Job</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="institute">Institute</label>
                            <input type="text" name="institute" id="institute" class="form-control" placeholder="Enter name of institute">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="facebook_url">Facebook URL</label>
                           <input type="text" name="facebook_url" id="facebook_url" class="form-control" placeholder="Enter your facebook url">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="giverFromInspiration">Who inspired you about MBF?</label>
                           <input type="text" name="giverFromInspiration" id="giverFromInspiration" class="form-control" placeholder="Enter your Giver from Inspiration">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-6 my-auto">
                                <div class="form-group">
                                    <label for="image">Your formal Photo <span class="text-danger">* (recommended image size 160x160)</span></label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 m-0 p-0">
                        <h3 class="text-center">Present Address</h3>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prDivison">Division <span class="text-danger">*</span></label>
                            <select name="prDivison" id="prDivison" class="form-control">
                                <option value="">-Select-</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prDistrict">District <span class="text-danger">*</span></label>
                            <select name="prDistrict" id="prDistrict" class="form-control">
                                <option value="">-Select-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prThana">Thana <span class="text-danger">*</span></label>
                            <select name="prThana" id="prThana" class="form-control">
                                <option value="">-Select-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prPostOffice">Post Office <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="prPostOffice" id="prPostOffice" placeholder="Enter Post Office">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prZIP">ZIP Code</label>
                            <input type="text" class="form-control" name="prZIP" id="prZIP" placeholder="Enter ZIP Code">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prVillage">Village</label>
                            <input type="text" class="form-control" name="prVillage" id="prVillage" placeholder="Enter Name of Village">
                        </div>
                    </div>
                    <div class="col-sm-12 m-0 p-0">
                        <h3 class="text-center">Permanent Address</h3>
                        <p class="text-black ml-5 pl-5"> <i class="text-danger fa fa-question-circle"></i> Permanent address same as present address?
                            <label for="presentSameTrue"><input type="radio" id="presentSameTrue" name="presentsame" value="true"> Yes</label>
                            <label for="presentSameFalse"><input checked type="radio" id="presentSameFalse" name="presentsame" value="false"> NO</label>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pmDivison">Division <span class="text-danger">*</span></label>
                            <select name="pmDivison" id="pmDivison" class="form-control">
                                <option value="">-Select-</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pmDistrict">District <span class="text-danger">*</span></label>
                            <select name="pmDistrict" id="pmDistrict" class="form-control">
                                <option value="">-Select-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pmThana">Thana <span class="text-danger">*</span></label>
                            <select name="pmThana" id="pmThana" class="form-control">
                                <option value="">-Select-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pmPostOffice">Post Office <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pmPostOffice" id="pmPostOffice" placeholder="Enter Post Office">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pmZIP">ZIP Code</label>
                            <input type="text" class="form-control" name="pmZIP" id="pmZIP" placeholder="Enter ZIP Code">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pmVillage">Village</label>
                            <input type="text" class="form-control" name="pmVillage" id="pmVillage" placeholder="Enter Name of Village">
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Apply Now</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
@section('footer_js')
  <script>
    // get  present district
    $('#prDivison').change(function(){
        var division_id = $('#prDivison').val();
        if(division_id){
            $.ajax({
                type:"GET",
                url:"{{url('get/ajax/present/district/info')}}/"+division_id,
                success:function(res){
                    if(res){
                        $("#prDistrict").empty();
                        $("#prDistrict").append('<option value="">-Select-</option>');
                        $.each(res,function(key,value){
                            $("#prDistrict").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                        // get present thana
                        $('#prDistrict').change(function(){
                            var district_id = $('#prDistrict').val();
                            if(district_id){
                                $.ajax({
                                    type:"GET",
                                    url:"{{url('get/ajax/present/thana/info')}}/"+district_id,
                                    success:function(res2){
                                        if(res2){
                                            $("#prThana").empty();
                                            $("#prThana").append('<option value="">-Select-</option>');
                                            $.each(res2,function(key,value){
                                                $("#prThana").append('<option value="'+value.id+'">'+value.name+'</option>');
                                            });

                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }
    });
    // get  Permanent district
    $('#pmDivison').change(function(){
        var pmdivision_id = $('#pmDivison').val();
        if(pmdivision_id){
            $.ajax({
                type:"GET",
                url:"{{url('get/ajax/permanent/district/info')}}/"+pmdivision_id,
                success:function(res){
                    if(res){
                        $("#pmDistrict").empty();
                        $("#pmDistrict").append('<option value="">-Select-</option>');
                        $.each(res,function(key,value){
                            $("#pmDistrict").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                        // get present thana
                        $('#pmDistrict').change(function(){
                            var pmdistrict_id = $('#pmDistrict').val();
                            if(pmdistrict_id){
                                $.ajax({
                                    type:"GET",
                                    url:"{{url('get/ajax/permanent/thana/info')}}/"+pmdistrict_id,
                                    success:function(res2){
                                        if(res2){
                                            $("#pmThana").empty();
                                            $("#pmThana").append('<option value="">-Select-</option>');
                                            $.each(res2,function(key,value){
                                                $("#pmThana").append('<option value="'+value.id+'">'+value.name+'</option>');
                                            });

                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }
    });
    // permanent address same
    $('#presentSameTrue').click(function(){
        $('#pmDivison').attr('disabled','');
        $('#pmDistrict').attr('disabled','');
        $('#pmThana').attr('disabled','');
        $('#pmPostOffice').attr('disabled','');
        $('#pmZIP').attr('disabled','');
        $('#pmVillage').attr('disabled','');
    });
    $('#presentSameFalse').click(function(){
        $('#pmDivison').removeAttr('disabled');
        $('#pmDistrict').removeAttr('disabled');
        $('#pmThana').removeAttr('disabled');
        $('#pmPostOffice').removeAttr('disabled');
        $('#pmZIP').removeAttr('disabled');
        $('#pmVillage').removeAttr('disabled');
    });

  </script>
@endsection
