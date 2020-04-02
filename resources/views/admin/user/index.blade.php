@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @include('admin.user.uploadimage')
        @include('admin.includes.flash_message')

        <div class="page-wrapper">

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
            <div class="col-md-2" style="float:right">
                <a class="btn btn-lg btn-round btn-dark pull-right" href="#" data-toggle="modal" data-target="#Users"><i class="fa fa-plus"></i> Create User</a>
            </div>
            <br><br>
            <div class="container-fluid">
        {{-- -------------------------- Search Form Start here ------------ --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-search fa-lg"></i> Search</h2>
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
                        <form action="{{route('user.search')}}" method="GET" class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <input type="text" name="search" class="form-control" id="fname" placeholder="Employee name">
                                    </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-search "></i> Search</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    
                  {{-- -------------------------- Search Form End here ------------ --}}


                  {{-- -------------------------- Search Form Start here ------------ --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-user fa-lg"></i> User List</h2>
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
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%">
                                {{-- <table id="zero_config" class="table table-striped table-bordered"> --}}
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Leaves</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        {{-- <th>{{$loop->index+1}}</th> --}}
                                        <td><img src="{{ asset('uploads/gallery/' . $user->image) }}" width="80px" height="80px" alt="Image"> </td>
                                        <td><a href={{ route('user.profile',$user->id) }}><b class="btn btn-round btn-dark">{{ $user->username }}</b></a></td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                           <div class=" btn btn-round btn-info"> {{$user->approve_leave_count}}</div>
                                        </td>
                                        <td>
                                            <a href="{{route('managesalary.detail',$user->id)}}" class="btn btn-sm btn-round btn-dark"><i class="fa fa-tag"></i> Pay</a>
                                        </td>
                                        <td >
                                            <button type="button"
                                                    username="{{$user->username}}"
                                                    role="{{$user->role}}"
                                                    email="{{$user->email}}"
                                                    salary="{{$user->salary}}"
                                                    phone="{{$user->phone}}"
                                                    address="{{$user->address}}"
                                                    gender="{{$user->gender}}"
                                                    dob="{{$user->dob}}"
                                                    join_date="{{$user->join_date}}"
                                                    job_type="{{$user->job_type}}"
                                                    city="{{$user->city}}"
                                                    age="{{$user->age}}"
                                                    class="view-data btn btn-sm btn-round btn-success"><i class="fa fa-eye"></i></button>
                                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-round btn-dark"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('user.document',$user->id)}}" class="btn btn-sm btn-round btn-dark" title="Add Document"><i class="fa fa-tag"></i></a>
                                            <a href="#" onclick="deletePost({{ $user->id }})" class="btn btn-sm btn-round btn-danger"><i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{ $user->id }}" action="{{route('user.delete',$user->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            {{-- <button type="button" </button> --}}
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
         
                {{--sweetalert box for deleting end--}}

                <div id="show-data" class="modal fade" id1="view-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="username"></p>
                                <p id="role"></p>
                                <p id="email"></p>
                                <p id="salary"></p>
                                <p id="phone"></p>
                                <p id="address"></p>
                                <p id="gender"></p>
                                <p id="dob"></p>
                                <p id="join_date"></p>
                                <p id="job_type"></p>
                                <p id="city"></p>
                                <p id="age"></p>
                                <p id="phone"></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>

    @endsection

    {{-- @section('js') --}}
                
    <script>
        $('.view-data').click(function(){
            var username=$(this).attr('username');
            var role=$(this).attr('role');
            var email=$(this).attr('email');
            var salary=$(this).attr('salary');
            var phone=$(this).attr('phone');
            var address=$(this).attr('address');
            var gender=$(this).attr('gender');
            var dob=$(this).attr('dob');
            var join_date=$(this).attr('join_date');
            var job_type=$(this).attr('job_type');
            var city=$(this).attr('city');
            var age=$(this).attr('age');
            $('#username').text(username);
            $('#role').text(role);
            $('#email').text(email);
            $('#salary').text(salary);
            $('#phone').text(phone);
            $('#address').text(address);
            $('#gender').text(gender);
            $('#dob').text(dob);
            $('#join_date').text(join_date);
            $('#job_type').text(job_type);
            $('#city').text(city);
            $('#age').text(age);
            // $('#show-data').show();
            alert(1)
        })
    </script>

    {{--sweetalert box for deleting start--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        function deletePost(id)

        {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your file is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>
{{-- @endsection --}}

