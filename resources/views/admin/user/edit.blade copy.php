@extends('admin.layout.master')

@section('content')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Admin Manager</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
     
            <form action="{{route('user.update',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf

                            {{-- ====================== --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h3>Update Photo</h3>
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
                      <div class="x_content ">
                            {{-------------------------image-----------------}}
    
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
                </div>

                {{-- ======================== --}}

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                          <h3>Update Details</h3>
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
                      <div class="x_content ">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="fname" class="form-control" id="fname" value="{{$user->first_name}}" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control" id="lname" value="{{$user->last_name}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <select type="text" name="role" class="form-control" id="lname">
                                            <option>{{$user->role}}</option>
                                            <option>admin</option>
                                            <option>employee</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="number" name="salary" class="form-control" value="{{$user->salary}}">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="text" name="email" class="form-control" id="lname" value="{{$user->email}}">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="number" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-6">
                                        <select type="text" name="gender" class="form-control" id="gender" value="{{$user->gender}}">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="date" name="dob" class="form-control" id="dob" value="{{$user->dob}}">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="date" name="join_date" class="form-control" id="join_date" value="{{$user->join_date}}">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="text" name="job_type" class="form-control" id="job_type" value="{{$user->job_type}}">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="city" class="form-control" id="city" value="{{$user->city}}">
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="number" name="age" class="form-control" id="lname" value="{{$user->age}}">
                                    </div>
                                </div>
                            </div>
                                    
                                    <div class="form-group">
                                    <div class="col-sm-6" style="display:none">
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" checked>Slack account <br>
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" >Trello account <br>
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" >Ipage account <br>
                                        <input type="checkbox" class="form-check-input" id="check1" name="option1" >Others
                                    </div>
                                </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-round  btn-dark pull-right"><i class="
                                        glyphicon glyphicon-refresh"></i> Update User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection



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
        <form action="{{url('user/employment_image/update', $users_id->user_id)}}" method="post" enctype="multipart/form-data"  class="form-horizontal form-label-left">
          @csrf 
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
            <div class="ln_solid"></div>
            <div class="form-group pull-right">
              <div class="col-md-12 col-sm-12 col-xs-12">
               <button type="submit" id="update_employment_skill" class="btn btn-dark btn-lg btn-round"><i class="fa fa-refresh"> Update Employee Skills </i></button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>