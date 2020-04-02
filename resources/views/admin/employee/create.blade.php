
@extends('admin.layout.master')

@section('content')

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Employee Management</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                  </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <form action="{{route('employee.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data" class="form-horizontal form-label-left">
      @csrf
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Employee <small>Registration</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Smart Wizard -->
            <div id="wizard" class="form_wizard wizard_horizontal">
              <ul class="wizard_steps">
                <li>
                  <a href="#step-1">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                                      Step 1<br />
                                      <small>Step 1 Employee Details</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                                      Step 2<br />
                                      <small>Step 2 Employeement Details</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-3">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                                      Step 3<br />
                                      <small>Step 3 Upload Documents</small>
                                  </span>
                  </a>
                </li>
                <li>
                  <a href="#step-4">
                    <span class="step_no">4</span>
                    <span class="step_descr">
                                      Step 4<br />
                                      <small>Step 4 Salary Detils</small>
                                  </span>
                  </a>
                </li>
              </ul>
              
              <div id="step-1">
                  <div class="row">
                   {{-- ====================== --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <img src="{{ asset('/image/default.png') }}" width="50px" height="30px" id="showImage1" style="pointer-events: none"/>
                      <input type="file" name="image" id="file-input"
                      accept="image/x-png,image/png,image/jpg,image/jpeg" style="display:none">
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content collapse">
                          {{-------------------------image-----------------}}
  
                      <img src="{{ asset('/image/default.png') }}" width="120px" height="110px" id="showImage" style="pointer-events: none"/>
                      <input type="file" name="image1" id="file-input"
                      accept="image/x-png,image/png,image/jpg,image/jpeg" style="display:none">

                          <input type="button" name="browse_file" id="browse_file" 
                          class="form-control  text-capitalize btn-choose" style="width:120px" 
                          class="btn btn-outline-danger" value="Choose">
                  </div>
                </div>
                </div>

              {{-- ======================== --}}
               
                  <h2 class="StepTitle">  </h2>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Employee Informtion <small> Portal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        
                        {{-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
    
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="fname" name="fname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter First Name">
                            </div>
                         
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="lname" name="lname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter Last Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="email" name="email" class="form-control col-md-7 col-xs-12" type="text" placeholder="Enter E-mail">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="female"> Female
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="phone" name="phone" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="phone" name="phone" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Phone Number">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <select name="country" id="country" class="form-control">
                               <option value="" selected disabled> Select Country</option>
                               <option value=""> Select Country</option>
                             </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="country" id="country" class="form-control">
                                <option value="" selected disabled> Select City</option>
                                <option value=""> Select Country</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="dob" name="dob" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Date of Birth" autocomplete="off">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="1"> &nbsp; Active &nbsp;
                                </label>
                                <label class="btn btn-danger" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="0"> In Active
                                </label>
                              </div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea id="address" name="address" class=" form-control col-md-7 col-xs-12" cols="5" rows="2" placeholder="Enter Address"></textarea>
                            </div>
                          
                          </div>
                          {{-- <div class="ln_solid"></div>
                            <h3> Continue Next to Employeement </h3> --}}
                      </div>
                    {{-- </form> --}}
                    </div>
                  </div>
                </div>

              </div>
              <div id="step-2">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Employeement Information<small> Portal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br /> 
                        {{-- <form class="form-horizontal form-label-left"> --}}
                          <div class="form-group">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input type="text" id="employee_id" name="employee_id" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter First Name">
                            </div>
                         
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" id="jdate" name="jdate" required="required" class="form-control col-md-7 col-xs-12" placeholder="join Date" value="">
                            </div>
                          
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select name="country" id="country" class="form-control">
                               <option value="" selected disabled> Employee Role</option>
                               <option value=""> Select Country</option>
                             </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="designation" name="designation" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Designation">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="username" name="username" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Username">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="password" name="password" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Password">
                            </div>
                          </div>

                            <div class="form-group">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                             <select name="country" id="country" class="form-control">
                               <option value="" selected disabled> Select Country</option>
                               <option value=""> Select Country</option>
                             </select>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <select name="country" id="country" class="form-control">
                                <option value="" selected disabled>Type of Employee</option>
                                <option value=""> Select Country</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="office_email" name="office_email" class=" form-control col-md-7 col-xs-12" required="required" type="email" placeholder="Enter Office E-mail" autocomplete="off">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="emergency_number" name="emergency_number" class=" form-control col-md-7 col-xs-12" required="required" type="phone" placeholder="Enter Emergency Number" autocomplete="off">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="passport" name="passport" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Passport Number" autocomplete="off">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input id="passport" name="passport" class=" form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Enter Passport Number" autocomplete="off">
                            </div>
                          </div>

                          {{-- <div class="ln_solid"></div>
                          <h3 style="font-style:Times New Romes; text-transform:upercase"> Continue to Next Step.....</h3> --}}
                        {{-- </form> --}}
                        </div>
                    </div>
                  </div>
                </div>
              
              </div>

              <div id="step-3">

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Document Upload <small>Portal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p>
                        <form action="form_upload.html" class="dropzone"></form>
                        <br />
                        <br />
                        <div class="form-group">
                          <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="skill_1" name="skill_1"  class="form-control col-md-7 col-xs-12" placeholder="Enter Skill ">
                          </div>
                        
                          <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="skill_2" name="skill_2" class="form-control col-md-7 col-xs-12" placeholder="Enter Skill">
                          </div>
                        
                          <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="skill_3" name="skill_3"  class="form-control col-md-7 col-xs-12" placeholder="Enter Skill">
                          </div>
                        </form>
                        </div>
                        <br />
                        <br />
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div id="step-4">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Salary Detail <small>Portal</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
       
                          <div class="form-group">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input type="text" id="bank_name" name="bank_name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter Bank Name">
                            </div>
                         
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" id="account_number" name="account_number" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter Account Number">
                            </div>
                          
                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <input type="text" id="salary_amount" name="salary_amount" required="required" class="form-control col-md-7 col-xs-12" placeholder=" Salary Amount">
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <input id="medical_allowance" name="medical_allowance" class=" form-control col-md-7 col-xs-12" type="text" placeholder="Medical Allowance">
                          </div>
                          </div>
 
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                              <button type="submit" class="btn btn-lg btn-round btn-success pull-right">Register Employee</button>
                            </div>
                          </div>
                        {{-- </form> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End SmartWizard Content -->
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
@endsection

<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>