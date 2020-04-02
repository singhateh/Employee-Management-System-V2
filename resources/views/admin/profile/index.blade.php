@extends('admin.layout.master')

@section('content')


      <!-- page content -->

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>{{ $user_details->last_name }} Profile</h3>
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

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>{{ $user_details->last_name }} Report <small>Activity report</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li>
                      @can('isAdmin')
                      <div class="form-group">
                      <a href="{{route('user')}}" class="btn btn-round btn-sm btn-info"><i class="fa fa-return"></i> Back</a>
                    </div>
                    @endcan
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="{{ asset('/uploads/gallery/' .$user_details->image) }}" alt="Avatar" title="Change the avatar" width="200px" height="190">
                      </div>
                    </div>
                    <h3>{{$user_details->username}}</h3>

                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-map-marker user-profile-icon"></i> 
                        {{$user_details->city.' ' .$user_details->address}}
                      </li>

                      <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> 
                        {{$user_details->job_type}}
                      </li>

                      <li>
                        <i class="fa fa-home"></i> 
                        {{$user_details->department}}
                      </li>

                      <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> 
                        {{$user_details->designation_type}}
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                      </li>
                    </ul>

                    <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br />

                    <!-- start skills -->
                    <h4>Skills</h4>
                    <ul class="list-unstyled user_data">
                      <li>
                        <p>{{ $user_details->skill_name1 }}</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $user_details->percentage1 }}"></div>
                        </div>
                      </li>
                      <li>
                        <p>{{ $user_details->skill_name2 }}</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $user_details->percentage2 }}"></div>
                        </div>
                      </li>
                      <li>
                        <p>{{ $user_details->skill_name3 }}</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal=" {{ $user_details->percentage3 }}"></div>
                        </div>
                      </li>
                      <li>
                        <p>{{ $user_details->skill_name4 }}</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $user_details->percentage4 }}"></div>
                        </div>
                      </li>
                    </ul>
                    <!-- end of skills -->

                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>User Activity Report</h2>
                      </div>
                      <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                      </div>
                    </div>
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="width:100%; height:280px;"></div>
                    <!-- end of user-activity-graph -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Change Password</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                          <!-- start recent activity -->
                          <ul class="messages">
                            <li>
                              <img src="{{ asset('/uploads/gallery/' .$user_details->image) }}" class="avatar" alt="Avatar">
                              <div class="message_date">
                                <h3 class="date text-info">24</h3>
                                <p class="month">May</p>
                              </div>
                              <div class="message_wrapper">
                                <h4 class="heading">Desmond Davison</h4>
                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                <br />
                                <p class="url">
                                  <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                  <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                </p>
                              </div>
                            </li>
                            <li>
                              <img src="{{ asset('/uploads/gallery/' .$user_details->image) }}" class="avatar" alt="Avatar">
                              <div class="message_date">
                                <h3 class="date text-error">21</h3>
                                <p class="month">May</p>
                              </div>
                              <div class="message_wrapper">
                                <h4 class="heading">Brian Michaels</h4>
                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                <br />
                                <p class="url">
                                  <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  <a href="#" data-original-title="">Download</a>
                                </p>
                              </div>
                            </li>
                            <li>
                              <img src="{{ asset('/uploads/gallery/' .$user_details->image) }}" class="avatar" alt="Avatar">
                              <div class="message_date">
                                <h3 class="date text-info">24</h3>
                                <p class="month">May</p>
                              </div>
                              <div class="message_wrapper">
                                <h4 class="heading">Desmond Davison</h4>
                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                <br />
                                <p class="url">
                                  <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                  <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                </p>
                              </div>
                            </li>
                            <li>
                              <img src="{{ asset('/uploads/gallery/' .$user_details->image) }}" class="avatar" alt="Avatar">
                              <div class="message_date">
                                <h3 class="date text-error">21</h3>
                                <p class="month">May</p>
                              </div>
                              <div class="message_wrapper">
                                <h4 class="heading">Brian Michaels</h4>
                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                <br />
                                <p class="url">
                                  <span class="fs1" aria-hidden="true" data-icon=""></span>
                                  <a href="#" data-original-title="">Download</a>
                                </p>
                              </div>
                            </li>

                          </ul>
                          <!-- end recent activity -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          <!-- start user projects -->
                          <table class="data table table-striped no-margin">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Client Company</th>
                                <th class="hidden-phone">Hours Spent</th>
                                <th>Contribution</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>New Company Takeover Review</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">18</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>New Partner Contracts Consultanci</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">13</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Partners and Inverstors report</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">30</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>New Company Takeover Review</td>
                                <td>Deveint Inc</td>
                                <td class="hidden-phone">28</td>
                                <td class="vertical-align-mid">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title alert alert-dark btn-dark">
              <h2>Personal Details</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                {{-- <li>
                   <div class="col-md-2" style="float:right">
                       <a class="btn btn-round btn-sm btn-success pull-right" href="#" data-toggle="modal" data-target="#State"><i class="fa fa-plus"></i> Create State</a>
                     </div>
                </li> --}}
              </ul>
              <div class="clearfix"></div>
            </div>
  
            <div class="x_content">
              <table class="table">
                <tbody>
                  <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-credit-card"></i></td>
                    <td><strong>Full Name</strong></td>
                    <td>{{ $user_details->first_name. ' '. $user_details->last_name }}</td>

                   </tr>

                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-user"></i>
                        </td>
                        <td><strong>Username</strong></td>
                        <td>{{$user_details->username}}</td>
                    </tr>
                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                        </td>
                        <td><strong>Birthday</strong></td>
                        <td>{{$user_details->dob}}</td>
                    </tr>
                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-mars-double"></i>
                        </td>
                        <td><strong>Gender</strong></td>
                        <td>{{$user_details->gender}}</td>
                    </tr>
                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-phone"></i>
                        </td>
                        <td><strong>Phone number</strong></td>
                        <td>{{$user_details->phone}}</td>
                    </tr>
                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope"></i>
                        </td>
                        <td><strong>Email</strong></td>
                        <td>{{$user_details->email}}</td>
                    </tr>
                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-calendar"></i>
                        </td>
                        <td><strong>Join date</strong></td>
                        <td>{{$user_details->join_date}}</td>
                    </tr>
                    <tr>
                        <td style="width: 10px" class="text-center"><i class="fa fa-flag"></i>
                        </td>
                        <td><strong>Country</strong></td>
                        <td>{{$user_details->country}}</td>
                    </tr>
                    <tr>
                      <td style="width: 10px" class="text-center"><i class="fa fa-building-o"></i>
                      </td>
                      <td><strong>City</strong></td>
                      <td>{{$user_details->city}}</td>
                  </tr>
                  <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-tasks"></i>
                    </td>
                    <td><strong>Jobe Type</strong></td>
                    <td>{{$user_details->job_type}}</td>
                </tr>
                <tr>
                  <td style="width: 10px" class="text-center"><i class="fa fa-home"></i>
                  </td>
                  <td><strong>Department</strong></td>
                  <td>{{$user_details->department}}</td>
              </tr>

              <tr>
                <td style="width: 10px" class="text-center"><i class="fa fa-work"></i>
                </td>
                <td><strong>Designation</strong></td>
                <td>{{$user_details->designation_type}}</td>
            </tr>
                </tbody>
            </table>
                  
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title alert alert-info btn-info">
              <h2>Bank Details</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table class="table">
                <tbody>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-credit-card"></i></td>
                    <td><strong>Account Holder </strong></td>
                    <td>{{ $user_details->first_name. ' '. $user_details->last_name }}</td>

                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-credit-card"></i></td>
                    <td><strong>Account Number</strong></td>
                    <td>{{ $user_details->account_number}}</td>

                </tr>
                <tr>

                    <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                    <td><strong>off Account Number</strong></td>
                    <td>15**********4846</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-universal-access"></i></td>
                    <td><strong>Bank Name</strong></td>
                    <td>{{ $user_details->bank_name}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-money"></i></td>
                    <td><strong>Salary Amount</strong></td>
                    <td><i class="fa fa-usd"></i> {{ $user_details->salary_amount}}</td>
                </tr>
                <tr>
                    <td style="width: 10px" class="text-center"><i class="fa fa-code"></i></td>
                    <td><strong>Ifsc Code</strong></td>
                    <td>{{ $user_details->account_number}}</td>
                </tr>
                </tbody>
            </table>
                  
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

        <!-- start user projects -->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title alert alert-primary btn-primary">
              <h2>Change Password</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
             
                <form action="{{route('userupdate.password')}}" method="post" class="form-horizontal">
                    @csrf
                        <div class="form-group">
                            <div class="col-sm-12">
                              <label for="" class="col-md-4">Current Password</label>
                              <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter your current password">
                              <input type="hidden" name="user_id" class="form-control" id="user_id" value="{{ $user_details->id }}">
                              <div class="col" id="messageError"></div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                              <label for="" class="col-md-4">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter a new password">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                              <label for="" class="col-md-4">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter confirm your password">
                                <div class="col" id="messageErrorPassword"></div>
                              </div>
                        </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" id="changePass" class="btn btn-dark btn-round pull-right">Change Password</button>
                        </div>
                        <br><br>
                    </div>
                </form>
                  
            </div>
          </div>
        </div>
        <!-- end user projects -->

      </div>
         </div>
           </div>
          </div>
        </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <!-- /page content -->

@endsection

