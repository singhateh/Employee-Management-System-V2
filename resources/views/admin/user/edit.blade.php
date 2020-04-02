
@extends('admin.layout.master')

@section('content')

  <div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              
            <h2><b>Update</b> Employee Info<small> Portal</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br /> 
            <form action="{{route('user.update',$users_id->user_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
            
                    <div class="form-group">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="custom-file">
                              @if($user->image != " ")
                              <img src="{{ asset('/uploads/gallery/' .$user->image) }}" width="120px" height="110px" id="showImage" style="pointer-events: none"/>
                         <input type="file" name="image" id="file-input" value="{{$user->image}}"
                             accept="image/x-png,image/png,image/jpg,image/jpeg" style="display:none">
                              @else
                              <img src="{{ asset('/image/default.png') }}" width="120px" height="110px" id="showImage" style="pointer-events: none"/>
                             <input type="file" name="image" id="file-input"
                             accept="image/x-png,image/png,image/jpg,image/jpeg" style="display:none">
                             @endif
            
                              <input type="button" name="browse_file" id="browse_file" 
                              class="form-control  text-capitalize btn-choose" style="width:120px" 
                              class="btn btn-outline-danger" value="Choose"> 
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text"   class="form-control col-md-7 col-xs-12" placeholder="join Date" value="{{ date('Y-M-d', strtotime($user->join_date)) }}" disabled>
                    </div>
                </div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="fname" name="fname" value="{{$user->first_name}}" class="form-control col-md-7 col-xs-12" placeholder="Enter First Name">
                        <input type="hidden" id="img" name="img" value="{{$user->image}}" class="form-control col-md-7 col-xs-12" placeholder="Enter First Name">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="lname" name="lname" value="{{$user->last_name}}" class="form-control col-md-7 col-xs-12" placeholder="Enter Last Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" name="email" value="{{$user->email}}" class="form-control col-md-7 col-xs-12" type="text" placeholder="Enter E-mail">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="{{$user->gender}}" @if ($user->gender == "male") checked  @endif >
                            &nbsp; Male &nbsp;
                           
                          </label>
                          <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="{{$user->gender}}" @if ($user->gender == "female") checked  @endif>
                            Female
                           
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="username" name="username" value="{{ $user->username }}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Enter Username">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" name="password" value="{{ $user->password }}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Enter Password">
                        </div>
                      </div>
            
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" name="phone" value="{{$user->phone}}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="role" id="role" class="form-control" value="{{ $user->role }}">
                           <option value=""  disabled> Employee Role</option>
                           @foreach($roles as $role)
                          <option value="{{$role->role}}"> {{$role->role}}</option>
                           @endforeach
                         </select>
                        </div>
                      </div>
            
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="country" id="country" class="form-control js-example-responsive " value="{{$user->country}}">
                           <option value=""  disabled> Select Country</option>
                           @foreach($countries as $country)
                          <option value="{{$country->code}}"> {{$country->name}}</option>
                           @endforeach
                         </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="city" id="city" class="form-control" value="{{$user->city}}">
                            <option value=""  disabled> Select City</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}"> {{$city->name}}</option>
                             @endforeach
                          </select>
                        </div>
                      </div>
            
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="{{date('d/m/y'), strtotime($user->dob)}}" class="form-control has-feedback-left" id="single_cal1" name="dob" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="status" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-success"  @if ($user->status == 1) checked  @endif data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                          <input type="radio" name="status" value="1"> &nbsp; Active &nbsp;
                        </label>
                        <label class="btn btn-danger"  @if ($user->status == 0) checked  @endif data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                          <input type="radio" name="status" value="0"> In Active
                        </label>
                      </div>
                    </div>
                  </div>
            
                  <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <textarea id="address" name="address"  class=" form-control col-md-7 col-xs-12" cols="5" rows="2" placeholder="Enter Address">{{$user->address}}</textarea>
                      </div>
                    </div>
            
                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employee Info </i></button>
                        </div>
                    </div>
            </form>
            </div>
        </div>
      {{-- </div> --}}
      <div class="x_panel">
        <div class="x_title">
          <h2><b>Update</b> Employee Bank Details <small>Portal</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content collapse">
          <br />
          <div  class="form-horizontal form-label-left">
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="bank_name" name="bank_name" value="{{$user->bank_name}}"  class="form-control col-md-7 col-xs-12" placeholder="Enter Bank Name">
                <input type="hidden" id="salary_id" name="salary_id" value="{{$salary->salary_id}}"  class="form-control col-md-7 col-xs-12" placeholder="Enter Bank Name">
              </div>
           
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="account_number" name="account_number" value="{{$user->account_number}}" class="form-control col-md-7 col-xs-12" placeholder="Enter Account Number">
              </div>
            </div>
              <div class="form-group">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" id="salary_type" name="salary_type" value="{{$user->salary_type}}" class="form-control col-md-7 col-xs-12" placeholder=" Salary Type">
                </div>
    
              <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" id="salary_amount" name="salary_amount" value="{{$user->salary_amount}}" class="form-control col-md-7 col-xs-12" placeholder=" Salary Amount">
              </div>
  
              <div class="col-md-4 col-sm-6 col-xs-12">
                <input id="allowance_amount" name="allowance_amount" value="{{$user->allowance_amount}}" class=" form-control col-md-7 col-xs-12" type="text" placeholder="Medical Allowance">
            </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <button type="submit" id="change_salary" class="btn btn-lg btn-round btn-dark"><i class="fa fa-refresh"></i> Update Employee Bank Detail</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><b>Update </b> Employee Designation <small> Portal</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content ">
          <div  class="form-horizontal form-label-left">

                <div class="form-group">
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    {{-- <input id="designation_id" name="designation_id" value="{{ $designation->designation_id }}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Enter Password" disabled> --}}
                    <input value="{{ $user->roll_no }}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Roll No" disabled>
                  </div>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input id="designation_type" name="designation" value="{{ $user->designation_type }}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Enter Designation">
                    <input id="designation_id" name="designation_id" value="{{ $designation->designation_id }}" class=" form-control col-md-7 col-xs-12"  type="hidden" placeholder="Enter Designation">
                  </div>
                </div>
                <div class="ln_solid"></div>
              <div class="form-group pull-right">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <button type="submit" id="change_designation" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employee Designation </i></button>
                  </div>
                </div>
              </div>
      </div>
    </div>
    </div>

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><b>Update</b> Employeement Information<small> Portal</small></h2>
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
            <div class="form-horizontal form-label-left">
              <div class="form-group" style="display:none">
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" id="employment_id" name="employment_id"  disabled value="{{ $employent->employent_id }}">
                </div>
             
                <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="text" id="single_cal4" name="jdate"  class="form-control col-md-7 col-xs-12" placeholder="join Date" value="{{ $user->join_date }}" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="employee_type" id="employee_type" class="form-control" value="{{ $user->employee_type }}">
                  <option value="" disabled>Select Type of Employee</option>
                  <option value="fulltime"> Full Time</option>
                  <option value="parttime"> Part Time</option>
                  <option value="contract"> Contract</option>
                  <option value="intan"> Intanship</option>
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="office_email" name="office_email" value="{{ $user->office_email }}" class=" form-control col-md-7 col-xs-12"  type="email" placeholder="Enter Office E-mail" autocomplete="off">
              </div>
              </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="passport" name="passport" value="{{ $user->passport }}" class=" form-control col-md-7 col-xs-12"  type="text" placeholder="Enter Passport Number" autocomplete="off">
                  </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="emergency_number" name="emergency_number" value="{{ $user->emergency_number }}" class=" form-control col-md-7 col-xs-12"  type="phone" placeholder="Enter Emergency Number" autocomplete="off">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group pull-right">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  {{-- <button type="submit" id="change_designation" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employee Designation </i></button> --}}
                 <button type="submit" id="update_employment" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employment Details </i></button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><b>Update</b> Employee Skills<small> Portal</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content collapse">
            <br /> 
            <div class="form-horizontal form-label-left">
              <div class="form-group">
                <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" id="skill_1" name="skill_1" value="{{ $user->skill_name1 }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Skill ">
                <input type="hidden" id="skill_id"  value="{{ $skill->skill_id }}" class="form-control col-md-7 col-xs-12">
                </div>
              
                <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" id="skill_2" name="skill_2" value="{{ $user->skill_name2 }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Skill">
                </div>
              
                <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" id="skill_3" name="skill_3" value="{{ $user->skill_name3 }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Skill">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group pull-right">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <button type="submit" id="update_employment_skill" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employee Skills </i></button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><b>Update</b> Employee Documents<small> Portal</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content collapse">
            <br /> 
              <p>Drag multiple files to the box below for multi upload or click to select files.</p>
              <form action="form_upload.html" class="dropzone"></form>
              <div class="ln_solid"></div>
              <div class="form-group pull-right">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <button type="submit" id="update_employment_skill" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employee Document </i></button>
                  </div>
                </div>
            </div>
        </div>
      </div>
</div>
{{-- </div> --}}
@endsection

@section('js')
<script>
  $(document).ready(function() {
      alert('designationID')
  
  });
  </script>
@endsection

{{-- <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script> --}}