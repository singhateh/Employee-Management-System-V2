
  <!-- Modal -->
  <div class="modal fade" id="Users" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#eee; color:#0000">
          <h3 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:black">Add New User</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <form action="{{url('user/employment_image/update', $users_id->user_id)}}" method="post" enctype="multipart/form-data"  class="form-horizontal form-label-left">
            @csrf  --}}
            <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf

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

                {{-- ======================== --}}

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><span class="glyphicon glyphicon-pencil"></span> Details</h2>
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
                      <div class="x_content">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter a first name">
                            </div> 
                           
                            <div class="col-sm-6">
                                <input type="text" name="lname" class="form-control" id="lname" autocomplete="off" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="username" class="form-control" id="username" autocomplete="off" placeholder="Enter a user name">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password" class="form-control" id="password" autocomplete="off" placeholder="Enter password">
                            </div>
                        </div>
                       
                            <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" id="email" autocomplete="off" placeholder="Enter E-mail Address">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" placeholder="Enter Phone Number">
                            </div>
                        </div>
                           
                            <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="dob" autocomplete="off" class="form-control" id="dob" placeholder="Date of Birth">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="jdate" autocomplete="off" class="form-control" id="jdate" placeholder="Join Date">
                            </div>
                        </div>

                            <div class="form-group">
                            <div class="col-sm-6">
                                <select type="text" name="gender" class="form-control" id="gender">
                                    <option selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                                <div class="col-sm-6">
                                <select type="text" name="role" class="form-control" id="lname" placeholder="Role">
                                    <option selected disabled>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                          

                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control" id="address" autocomplete="off" placeholder="Enter Address">
                             </div>
    
                            <div class="col-sm-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected disabled> Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                    </div>
    
                    </div>
                  </div>
          
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Register User</button>
        </div>
    </form>
      </div>
    </div>
    </div>
  </div>

  