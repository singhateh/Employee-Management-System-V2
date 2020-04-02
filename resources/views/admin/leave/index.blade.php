@extends('admin.layout.master')

@section('content')
@include('admin.leave.create')

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
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Leave Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('leave')}}">Leave</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="float:right">
                @can('isEmployee')
                <a class="btn btn-lg btn-dark" href="#" data-toggle="modal" data-target="#Leave"><i class="fa fa-apple"></i> Apply leave</a>
                @endcan
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
            <form action="{{route('leave.search')}}" method="GET" class="form-horizontal">
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="search" class="form-control" id="fname" placeholder="Leave type">
                </div>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                    </div>
                </form>
                        </div>
                    </div>
                </div>
            {{-- </div>
        </div> --}}

                {{-- -------------------------- Search Form Start here ------------ --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-arrows fa-lg"></i> List of Request Leave</h2>
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
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>L type</th>
                                            <th>from</th>
                                            <th>to</th>
                                            <th>Days</th>
                                            <th>Reason</th>
                                            <th>offer</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($leaves as $leave)
                                            <tr>
                                                {{-- <td>{{$loop -> index+1 }}</td> --}}
                                                <td>{{$leave->users->username }}</td>
                                                <td>{{$leave->leave_type}}</td>
                                                <td>{{$leave->date_from}}</td>
                                                <td>{{ date('Y-m-d', strtotime($leave->date_to))}}</td>
                                                <td>{{$leave->days}}</td>
                                                <td>{{$leave->reason}}</td>
                                                <td>
                                                    @if(Auth::user()->role=='admin')
                                                        {{--{{$leave->is_approved}}--}}
                                                        @if($leave->leave_type_offer==0)
                                                            <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-round btn-success" name="paid" value="1">Paid</button>
                                                            </form>
                                                            <form id="{{$leave->id}}" action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                <button type="submit" onclick="return confirm('Are you sure want to paid for leave?')" class="btn btn-sm btn-round btn-danger" name="paid" value="2">Unpaid</button>
                                                            </form>
                                                        @elseif($leave->leave_type_offer==1)

                                                            <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-sm btn-round btn-danger" onclick="return confirm('Are you sure want to unpaid for leave?')" type="submit" name="paid" value="2">Unpaid</button>
                                                            </form>
                                                        @else
                                                            <form action="{{route('leave.paid',$leave->id)}}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-sm btn-round btn-success" onclick="return confirm('Are you sure want to piad for leave?')" type="submit" name="paid" value="1">Paid</button>
                                                            </form>
                                                        @endif

                                                        {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                        {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                        {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                    @else
                                                        @if($leave->leave_type_offer==0)
                                                            <span class="btn-sm btn-round -info">Pending</span>
                                                        @elseif($leave->leave_type_offer==1)
                                                            <span class="btn-sm btn-round btn-success">Paid</span>
                                                        @else
                                                            <span class="btn-sm btn-round btn-danger">Unpaid</span>
                                                        @endif
                                                    @endif
                                                        </td>

                                                        <td>
                                                            @if(Auth::user()->role=='admin')
                                                            {{--{{$leave->is_approved}}--}}
                                                            @if($leave->is_approved==0)
                                                                <form id="approve-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="approveLeave({{$leave->id}})" class="btn btn-sm btn-cyan" name="approve" value="1">Approve</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to approve leave?')" class="btn btn-sm btn-round btn-success" name="approve" value="1">Approve</button>
                                                                </form>
                                                                <form id="reject-leave-{{$leave->id}}" action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    {{--<button type="button" onclick="rejectLeave({{$leave->id}})" class="btn btn-sm btn-danger" name="approve" value="2">Reject</button>--}}
                                                                    <button type="submit" onclick="return confirm('Are you sure want to reject leave?')" class="btn btn-sm btn-round btn-danger" name="approve" value="2">Reject</button>
                                                                </form>
                                                            @elseif($leave->is_approved==1)

                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-round btn-danger" onclick="return confirm('Are you sure want to reject leave?')" type="submit" name="approve" value="2">Reject</button>
                                                                </form>
                                                            @else
                                                                <form action="{{route('leave.approve',$leave->id)}}" method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-round btn-success" onclick="return confirm('Are you sure want to approve leave?')" type="submit" name="approve" value="1">Approve</button>
                                                                </form>
                                                            @endif

                                                                {{--<a href="{{route('leave.approve',$leave->id)}}" class="btn btn-sm btn-cyan">Approve</a>--}}
                                                                {{--<a href="{{route('leave.pending',$leave->id)}}" class="btn btn-sm btn-warning">Pending</a>--}}
                                                                {{--<a href="{{route('leave.reject',$leave->id)}}" class="btn btn-sm btn-danger">Reject</a>--}}
                                                                @else
                                                                @if($leave->is_approved==0)
                                                                    <span class="btn-sm btn-round btn-info">Pending</span>
                                                                @elseif($leave->is_approved==1)
                                                                    <span class="btn-sm btn-round btn-success">Approved</span>
                                                                @else
                                                                    <span class="btn-sm btn-round btn-danger">Rejected</span>
                                                                @endif
                                                            @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $leaves->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    {{-- </div> --}}
    

@endsection