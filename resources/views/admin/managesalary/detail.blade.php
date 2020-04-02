@extends('admin.layout.master')
@section('content')


@php
$date = date('d-m-Y');

$monthly = date('F', strtotime($date));
$year = date('Y', strtotime($date));
$day = date('l', strtotime($date));
@endphp

    <style>
        @media print  {
            .page-breadcrumb{
                display: none;
            }
            .sidebar-nav{
                display: none;
            }
            .no-print {
                display: none;
            }
            .text-center{
                display: none;
            }
            .advance-pay{
                display: none;
            }
            .managesalary{
                display: none;
            }
            dl.employeedetails{
                border: 1px solid red;
                padding: 35px 70px 50px;
            }
            table.advancepayment{
                border: 1px solid red;
                padding: 35px 70px 50px;
            }
        }
    </style>

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
                    <h4 class="page-title">Salary management</h4>
                   

                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href=" ">Manage salary</a></li>
                            </ol>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <span class="alert alert-default"><b style="font-size:30px">{{$date}}</b></span>
        </div>
        <div class="form-group">
          <div class=" pull-right">
            <span class=" btn-danger btn-round btn-sm"><b>{{$day}}</b></span>
            <span class=" btn-success btn-round btn-sm"><b>{{$monthly}}</b></span>
            <span class=" btn-info btn-round btn-sm "><b>{{$year}}</b></span>
          </div>
        </div>
        <br><br>
        @include('admin.includes.flash_message')
            {{-- -------------------------- Search Form Start here ------------ --}}
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-dark btn-dark">
                    <h2><i class="fa fa-search fa-lg"></i> Search</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content collapse">
                    <form action="{{route('managesalary.detail',$user->id)}}" method="GET" class="form-horizontal no-print">
                        <div class="card-body">
                            <div class="form-group">
                              {{-- <input type="hidden" name="attendance_date" id="attendance_date1" value="{{$date}}"> --}}
                                <!-- Date Picker -->
                                <div class=" date col-md-5">
                                    <input type='text' value="{{request()->startdate}}" id="startDate" name="startdate" class="form-control" placeholder="From" />
                                </div>
                                <!-- Time Picker -->
                                <div class=" date col-md-5" >
                                    <input type='text' value="{{request()->enddate}}" id="endDate" name="enddate" class="form-control" placeholder="To" />
                                </div>

                                <div class="date" id="search">
                                    <button type="submit" class="btn btn-round btn-success"><i class="fa fa-search"></i> Search</button>
                                </div>
                            {{-- </div> --}}
                        </div>
                        {{-- <br><br> --}}
                    </form>
                  </div>
                </div>
              </div>
            {{-- </div> --}}

              {{-- -------------------------- Search Form End here ------------ --}}

              {{-- -------------------------- Manage Salary Start here ------------ --}}

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title  btn-info" >
                    <h2 style="text-transform:capitalize"><i class="fa fa-money fa-lg"></i> 
                        @if ($employee_gender == 'male')
                            Mr. {{ $employee_title }} Salary</h2>
                        @else
                        Mrs. {{ $employee_title }} Salary</h2>
                        @endif 

                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                        <dl class="row employeedetails">
                            <div class="form-group">
                            <dt class="col-sm-5">Employee Name:</dt>
                            <dd class="col-sm-7" name="employee_name" id="employee_name"><strong>{{$employee_name}}</strong></dd>
                            </div>
                            <hr>
                            <div class="form-group">
                            <dt class="col-sm-5">Employee Designation:</dt>
                            <dd class="col-sm-7" name="employee_designation" id="employee_designation">{{$des}}</dd>
                            </div>
                            <hr><hr>
                            <div class="form-group">
                            <dt class="col-sm-5">Employee Salary:</dt>
                            <dd class="col-sm-7 currency-usd" name="employee_salary" id="employee_salary"><i class="fa fa-usd"></i> @isset($paidSalary)
                              {{$paidSalary->paid_salary_amount}}
                            @endisset </dd>
                            </div>
                            <hr>
                            <hr>
                            <div class="form-group">
                            <dt class="col-sm-5">Employee Leave:</dt>
                            <dd class="col-sm-7" name="leave_count" id="leave_count"> {{$total_leaves}}</dd>
                            </div>
                            <hr>
                            <hr>
                            <div class="form-group">
                            <dt class="col-sm-5">Tax (1%): </dt>
                            <dd class="col-sm-7  " name="tax" id="tax"> </dd>
                           </div>
                            <hr>
                            <hr>
                            <dt class="col-sm-5">Advance Payment:</dt>
                            <dd class="col-sm-7 currency-usd" name="advance" id="advance"><i class="fa fa-usd"></i> {{$advancePayment->total}} </dd>
                            {{-- <div class="clearfix"></div> --}}
                            <hr>
                            <dt class="col-sm-5">Overtime Payment:</dt>
                            <dd class="col-sm-7 currency-usd" name="overtime" id="overtime"><i class="fa fa-usd"></i> {{$overtimePayment->overtime}} </dd>
                            {{-- <div class="clearfix"></div> --}}
                            <hr>
                            <dt class="col-sm-5">Bonus Payment:</dt>
                              <dd class="col-sm-7 currency-usd" name="bonus" id="bonus"><i class="fa fa-usd"></i> {{$bonusPayment->bonus}}  </dd>
                        </dl>

                        <hr>
                <div class="x_panel-footer">
                    <dt class="col-sm-5">Total:</dt>
                    <dd class="col-sm-7 currency-usd" name="total" id="total"><i class="fa fa-usd"></i> </dd>
                </div>
                <hr>
                <hr>
                <div class="x_panel-footer">
                    <dt class="col-sm-5">Grand Total:</dt>
                    <dd class="col-sm-7 currency-usd" name="total" id="grand-total"><i class="fa fa-usd"></i> </dd>
                </div>
                <hr><hr>
                    <button class="btn btn-danger" onclick="pdf()"><i class="fa fa-print"></i> Print</button>
              </div>
            </div>
        </div>

  
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title alert alert-dark btn-dark">
            <h2 style="text-transform:capitalize"><i class="fa fa-cc-mastercard fa-lg"></i>
                @if ($employee_gender == 'male')
                Pay  Mr. {{ $employee_title }} Monthly Salary</h2>
            @else
            Pay  Mrs. {{ $employee_title }}   Monthly Salary</h2>
            @endif 
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  
                </li>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form action="{{route('paysalary.store')}}" method="post" class="form-horizontal advance-pay">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{$user->id}}">
                    <input type="hidden" name="salary_id" value="{{$Salaryid->id}}">
                    <input type="hidden" name="month" id="month" value="{{$monthly}}">
                    <input type="hidden" name="year" id="year" value="{{$year}}">
                    <input type="hidden" name="day" id="day" value="{{$day}}">
                    <div class="form-group">
                    <div class="col-md-12">
                      <b class="btn-round btn-info btn-sm"> Monthly Salary  <i class="fa fa-usd"></i> {{$monthlySalary->salary}}</b> 
                    </div>
                    </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="date" id="date" class="form-control" placeholder="Date">
                            </div>
                            <div class="col-sm-6">
                              <select name="salary_type" id="salary_type" class="form-control">
                                <option value="" selected disabled> Choose Type</option>
                                @foreach ($salarytype as $type)
                              <option value="{{$type->id}}">{{$type->salary_type}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter amount" />
                        </div>
                          <div class="col-sm-6">
                              <input type="text" name="remark" id="remark" class="form-control" placeholder="Enter Remark">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                          </div>
                      </div>
                    <hr>
                    <button type="submit" class="btn btn-round btn-dark"><i class="fa fa-credit-card"></i> Monthly Payment </button>
                </form>

            </div>
          </div>
        </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title alert alert-success btn-success">
                <h2 style="text-transform:capitalize"><i class="fa fa-cc-mastercard fa-lg"></i>
                    @if ($employee_gender == 'male')
                    Pay  Mr. {{ $employee_title }} in Advance</h2>
                @else
                Pay  Mrs. {{ $employee_title }}   in Advance</h2>
                @endif 
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      
                    </li>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content collapse">

                    <form action="{{route('managesalary.makeadvance')}}" method="post" class="form-horizontal advance-pay">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{$user->id}}">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="date" id="date" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" />
                                </div>
                            </div>
                        <hr>
                        <button type="submit" class="btn btn-round btn-success"><i class="fa fa-credit-card"></i> Advance Payment </button>
                    </form>

                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-danger btn-danger">
                  <h2 style="text-transform:capitalize"><i class="fa fa-eur fa-lg"></i>
                      @if ($employee_gender == 'male')
                      Pay  Mr. {{ $employee_title }} for Overtime</h2>
                  @else
                  Pay  Mrs. {{ $employee_title }}   for Overtime</h2>
                  @endif 
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content collapse">
  
                      <form action="{{route('managesalary.overtimepayment')}}" method="post" class="form-horizontal overtime-pay">
                          @csrf
                          <input type="hidden" name="employee_id" value="{{$user->id}}">
                              <div class="form-group">
                                  <div class="col-sm-6">
                                      <input type="text" name="overtime_date" id="overtime_date" class="form-control">
                                  </div>
                                  <div class="col-sm-6">
                                      <input type="text" class="form-control" name="overtime_amount" id="overtime_amount" placeholder="Enter amount" />
                                  </div>
                              </div>
                          <hr>
                          <button type="submit" class="btn btn-round btn-danger"><i class="fa fa-eur"></i> Overtime Payment </button>
                      </form>
  
                  </div>
                </div>
              </div>

              {{-- <div class="clearfix"></div> --}}

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-default btn-primary" >
                  <h2 style="text-transform:capitalize"><i class="fa fa-bitcoin fa-lg"></i>
                      @if ($employee_gender == 'male')
                      Pay  Mr. {{ $employee_title }} Work Bonus</h2>
                  @else
                  Pay  Mrs. {{ $employee_title }}   Work Bonus</h2>
                  @endif 
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content collapse">
  
                      <form action="{{route('managesalary.bonuspayment')}}" method="post" class="form-horizontal bonus-pay">
                          @csrf
                          <input type="hidden" name="employee_id" value="{{$user->id}}">
                              <div class="form-group">
                                  <div class="col-sm-6">
                                      <input type="text" name="bonus_date" id="bonus_date" class="form-control">
                                  </div>
                                  <div class="col-sm-6">
                                      <input type="text" class="form-control" name="bonus_amount" id="bonus_amount" placeholder="Enter amount" />
                                  </div>
                              </div>
                          <hr>
                          <button type="submit" class="btn btn-round btn-primary"><i class="fa fa-btc"></i> Bonus Payment </button>
                      </form>
  
                  </div>
                </div>
              </div>

            <div class="clearfix"></div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title alert alert-success btn-success">
                  <h2><i class="fa fa-money"></i> Advance History</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content collapse">

                  {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">No </th>
                          <th class="column-title">Date </th>
                          <th class="column-title">Amount </th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($advance_details as $advances)
                            <tr>
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$advances ->date }}</td>
                                <td>{{$advances ->amount }}</td>
                                <td class="no-print">
                                    <div class="btn-group">
                                        <a href="{{route('user.edit',$advances->id)}}" class="btn-info btn-xs btn-round" title="Edit Advance"><i class="fa fa-edit"></i></a>
                                        <a href="#" onclick="deletePost({{ $advances->id }})" class="btn-danger btn-xs btn-round " title="Delete Advance"><i class="fa fa-trash"></i></a>
                                        <form id="delete-form-{{ $advances->id }}" action="{{route('advance-payment.delete',$advances->id)}}" method="put">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>  
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                  </div>
                          
                      
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-danger btn-danger">
                    <h2><i class="fa fa-money"></i> Overtime History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
  
                  <div class="x_content collapse">
  
                    {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}
  
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">No </th>
                            <th class="column-title"> Date </th>
                            <th class="column-title">Amount </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($overtime_details as $overtime)
                              <tr>
                                  <td class="a-center ">
                                      <input type="checkbox" class="flat" name="table_records">
                                  </td>
                                  <td>{{$loop -> index+1 }}</td>
                                  <td>{{$overtime ->overtime_date }}</td>
                                  <td>{{$overtime ->overtime_amount }}</td>
                                  <td class="no-print">
                                    <div class="btn-group">
                                        <a href="{{route('user.edit',$overtime->id)}}" class="btn-info btn-xs btn-round" title="Edit Overtime"><i class="fa fa-edit"></i></a>
                                        <a href="#" onclick="deletePost({{ $overtime->id }})" class="btn-danger btn-xs btn-round " title="Delete Overtime"><i class="fa fa-trash"></i></a>
                                        <form id="delete-form-{{ $overtime->id }}" action="{{route('overtime-payment.delete',$overtime->id)}}" method="put">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div> 
                                  </td>
                              </tr>
                          </tbody>
                          @endforeach
                      </table>
                    </div>
                            
                        
                  </div>
                </div>
              </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-primary btn-primary">
                    <h2><i class="fa fa-money"></i> Bonus History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
  
                  <div class="x_content collapse">
  
                    {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}
  
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">No </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Amount </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($bonus_details as $bonus)
                              <tr>
                                  <td class="a-center ">
                                      <input type="checkbox" class="flat" name="table_records">
                                  </td>
                                  <td>{{$loop -> index+1 }}</td>
                                  <td>{{$bonus ->bonus_date }}</td>
                                  <td>{{$bonus ->bonus_amount }}</td>
                                  <td class="no-print">
                                    <div class="btn-group">
                                        <a href="{{route('user.edit',$bonus->id)}}" class="btn-info btn-xs btn-round" title="Edit Bonus"><i class="fa fa-edit"></i></a>
                                        <a href="#" onclick="deletePost({{ $bonus->id }})" class="btn-danger btn-xs btn-round " title="Delete Bonus"><i class="fa fa-trash"></i></a>
                                        <form id="delete-form-{{ $bonus->id }}" action="{{route('bonus-payment.delete',$bonus->id)}}" method="put">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div> 
                                </td>
                              </tr>
                          </tbody>
                          @endforeach
                      </table>
                    </div>
                            
                        
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-dark btn-dark">
                    <h2>Transaction History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
  
                  <div class="x_content collapse">
  
                    {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}
  
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all1" class="flat">
                            </th>
                            <th class="column-title">No </th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Salary Type </th>
                            <th class="column-title">Paid Amount </th>
                            <th class="column-title">Salary Amount </th>
                            <th class="column-title">Tran Date </th>
                            <th class="column-title">Remark </th>
                            <th class="column-title">Description </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($transactions as $transaction)
                              <tr>
                                  <td class="a-center ">
                                  <input type="checkbox" class="flat" name="table_records" value="{{$transaction->id}}">
                                  </td>
                                  <td>{{$loop -> index+1 }}</td>
                                  <td>{{$transaction ->first_name.' '.$transaction->last_name }}</td>
                                  <td>{{$transaction ->salary_type }}</td>
                                  <td><i class="fa fa-usd"></i> {{$transaction ->paid_amount }}</td>
                                  <td><i class="fa fa-usd"></i> {{$transaction ->salary_amount }}</td>
                                  <td>{{$transaction ->transaction_date }}</td>
                                  <td>{{$transaction ->remark }}</td>
                                  <td>{{$transaction ->description }}</td>
                                  <td class="no-print">
                                      <div class="btn-group">
                                          <a href="{{route('user.edit',$transaction->id)}}" class="btn-info btn-xs btn-round" title="Edit Advance"><i class="fa fa-edit"></i></a>
                                          <a href="#" onclick="deletePost({{ $transaction->id }})" class="btn-danger btn-xs btn-round " title="Delete Advance"><i class="fa fa-trash"></i></a>
                                          {{-- <form id="delete-form-{{ $transaction->id }}" action="{{route('advance-payment.delete',$transaction->id)}}" method="put"> --}}
                                              {{-- @csrf
                                              @method('DELETE')
                                          </form> --}}
                                      </div>  
                                  </td>
                              </tr>
                          </tbody>
                          @endforeach
                      </table>
                    </div>
                            
                        
                  </div>
                </div>
              </div>
          </div>
        @endsection

          