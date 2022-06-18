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

            <form id="volunteer_apply_form" name="job_apply_form" action="includes/become-volunteer.php" method="post" enctype="multipart/form-data">
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
                            <label for="father_name">Father Name </label>
                            <input id="father_name" name="father_name" class="form-control" type="text" placeholder="Enter Father Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="mother_name">Mother Name </label>
                            <input id="mother_name" name="mother_name" class="form-control" type="text" placeholder="Enter Mother Name">
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="3rd_gender">3rd Gender</option>
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
                            <select name="nationality" id="nationality" class="form-control">
                                <option value="">Bangladeshi</option>
                                <option value="">indian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <select name="occupation" id="occupation" class="form-control">
                                <option value="">Student</option>
                                <option value="">Teacher</option>
                                <option value="">Farmer</option>
                                <option value="">Entrepreneur</option>
                                <option value="">Business</option>
                                <option value="">Banker</option>
                                <option value="">Government Job</option>
                                <option value="">Private Job</option>
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
                            <label for="prDistrict">District <span class="text-danger">*</span></label>
                            <select name="prDistrict" id="prDistrict" class="form-control">
                                <option value="">Dhaka</option>
                                <option value="">Mymensingh</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prThana">Thana <span class="text-danger">*</span></label>
                            <select name="prThana" id="prThana" class="form-control">
                                <option value="">Ishwargonj</option>
                                <option value="">Sadar</option>
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="prVillage">Village</label>
                            <input type="text" class="form-control" name="prVillage" id="prVillage" placeholder="Enter Name of Village">
                        </div>
                    </div>
                    <div class="col-sm-12 m-0 p-0">
                        <h3 class="text-center">Permanent Address</h3>
                        <label for="psap" class="text-center"><input type="checkbox" id="psap"> Permanent address same as present address </label>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prDistrict">District <span class="text-danger">*</span></label>
                            <select name="prDistrict" id="prDistrict" class="form-control">
                                <option value="">Dhaka</option>
                                <option value="">Mymensingh</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="prThana">Thana <span class="text-danger">*</span></label>
                            <select name="prThana" id="prThana" class="form-control">
                                <option value="">Ishwargonj</option>
                                <option value="">Sadar</option>
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="prVillage">Village</label>
                            <input type="text" class="form-control" name="prVillage" id="prVillage" placeholder="Enter Name of Village">
                        </div>
                    </div>

                </div>

              <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
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
