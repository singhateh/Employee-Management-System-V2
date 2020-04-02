@extends('admin.layout.master')

@section('content')

    {{-- @include('admin.includes.sidebar') --}}

    <div class="page-wrapper">
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
                    <h4 class="page-title">Employee Management</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('employee')}}">Employee</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{route('employee.update',$employee->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-lg-3 col-md-3 col-sm-3 pull-right">
                                    <div class="form-group pull-right">
                                    <table style="margin:0 auto; height:2%; width:4%">
                                    <thead>
                                        <tr class="info">
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                    <td class="image">
                                        @if($employee->image != " ")
                                         <img src="{{ asset('/uploads/gallery/' .$employee->image) }}" width="120px" height="110px" id="showImage" style="pointer-events: none"/>
                                    <input type="file" name="image" id="file-input" value="{{$employee->image}}"
                                        accept="image/x-png,image/png,image/jpg,image/jpeg" style="display:none">
                                         @else
                                         <img src="{{ asset('/image/default.png') }}" width="120px" height="110px" id="showImage" style="pointer-events: none"/>
                                        <input type="file" name="image" id="file-input"
                                        accept="image/x-png,image/png,image/jpg,image/jpeg" style="display:none">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background:;">
                                    <input type="button" name="browse_file" id="browse_file" 
                                    class="form-control  text-capitalize btn-choose" 
                                    class="btn btn-outline-danger" value="Choose">
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" name="fname" class="form-control" id="username" value="{{$employee->first_name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control" id="username" value="{{$employee->last_name}}">
                                    </div>
                                    <br><br>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" class="form-control" id="fname" value="{{$employee->email}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="phone" class="form-control" id="lname" value="{{$employee->phone}}">
                                    </div>
                                    <br><br>
                                    <div class="col-sm-6">
                                        <input type="text" name="address" class="form-control" id="lname" value="{{$employee->address}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="gender" class="form-control" id="lname" value="gender">
                                    </div>
                                    <br><br>
                                    <div class="col-sm-6">
                                        <input type="text" name="dob" class="form-control" id="dob" value="{{$employee->dob}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="jdate" class="form-control" id="jdate" value="{{$employee->join_date}}">
                                    </div>
                                    <br><br>
                                    <div class="col-sm-6">
                                        <input type="text" name="jtype" class="form-control" id="lname" value="{{$employee->job_type}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="city" class="form-control" id="lname" value="{{$employee->city}}">
                                    </div>
                                    <br><br>
                                    <div class="col-sm-6">
                                        <input type="text" name="salary" class="form-control" id="lname" value="{{$employee->salary}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="age" class="form-control" value="{{$employee->age}}">
                                    </div>
                                </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark pull-right"><i class="fa fa-edit"></i> Update Employee</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection