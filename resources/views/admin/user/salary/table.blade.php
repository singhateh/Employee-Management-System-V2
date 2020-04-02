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
        <div class="col-md-3">
          <span class="alert alert-default"><b style="font-size:30px">{{$date}}</b></span>
        </div>
        <div class="form-group">
          <div class=" pull-right">
            <span class=" btn-danger btn-round btn-sm"><b>{{$day}}</b></span>
            <span class=" btn-success btn-round btn-sm"><b>{{$monthly}}</b></span>
            <span class=" btn-info btn-round btn-sm "><b>{{$year}}</b></span>
          </div>
          <div class="col-sm-2 btn-dark btn-sm btn-round ">Total Paid Salary  <i class="fa fa-usd"></i> <b>
            
            @if ($Advancesalary == "" && $salary!= "" && $Bonussalary!= "" && $Overtimesalary != "" )
            {{$salary->amount + $Bonussalary->bonus_amount + $Overtimesalary->overtime_amount}}

            @elseif($Advancesalary != "" && $salary!= "" && $Bonussalary == "" && $Overtimesalary!= "" )
            {{$salary->amount + $Advancesalary->amount + $Overtimesalary->overtime_amount}}

            @elseif($Advancesalary != "" && $salary!= "" && $Bonussalary != "" && $Overtimesalary== "")
            {{$salary->amount + $Advancesalary->amount + $Bonussalary->bonus_amount}}

            @elseif($Advancesalary == "" && $salary== "" && $Bonussalary == "" && $Overtimesalary== "")
            0.00
            
            @else
            {{$salary->amount + $Bonussalary->bonus_amount + $Overtimesalary->overtime_amount + $Advancesalary->amount}}
            @endif
            
          </b>
        </div>
        <div class="col-sm-2 btn-dark btn-sm btn-round pull-right">Net Salary  <i class="fa fa-usd"></i> <b>{{$salary_amount->salary_amount}}</b></div>

        </div>

        <br><br>
        @include('admin.includes.flash_message')
            {{-- -------------------------- Search Form Start here ------------ --}}
           
            <div class="row">
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
                    {{-- <form action="{{route('managesalary.detail',Auth::user()->id)}}" method="GET" class="form-horizontal no-print"> --}}
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
            </div>

              {{-- -------------------------- Search Form End here ------------ --}}
              <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title alert alert-dark btn-dark">
                    <h2>Salary History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
  
                  <div class="x_content">
  
                    {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}
  
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all1" class="flat">
                            </th>
                            <th class="column-title">No </th>
                            {{-- <th class="column-title">Name </th> --}}
                            <th class="column-title">Salary Type </th>
                            <th class="column-title">Paid Amount </th>
                            <th class="column-title">Salary Amount </th>
                            <th class="column-title">Balance</th>
                            <th class="column-title"> Month </th>
                            <th class="column-title"> Day </th>
                            <th class="column-title"> Year </th>
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
                            @php
                                $originalBalance = 0;
                            @endphp
                          @foreach($employee_salary as $transaction)
                              <tr>
                                  <td class="a-center ">
                                  <input type="checkbox" class="flat" name="table_records" value="{{$transaction->id}}">
                                  </td>
                                  <td>{{$loop -> index+1 }}</td>
                                  {{-- <td>{{$transaction ->first_name.' '.$transaction->last_name }}</td> --}}
                                  <td>{{$transaction ->salary_type }}</td>
                                  <td><i class="fa fa-usd"></i> {{$transaction ->amount }}</td>
                                  <td><i class="fa fa-usd"></i> {{$transaction ->salary_amount }}</td>
                                  <td><i class="fa fa-usd"></i> @if ($originalBalance == 0) 
                                      <span style="color:red">{{$originalBalance + ($transaction->salary_amount - $transaction->amount)}}</span>
                                  @endif </td>
                                  <td> {{$transaction ->month }}</td>
                                  <td> {{$transaction ->day }}</td>
                                  <td> {{$transaction ->year }}</td>
                                  <td>{{$transaction ->transaction_date }}</td>
                                  <td>{{$transaction ->remark }}</td>
                                  <td>{{$transaction ->description }}</td>
                                  <td class="no-print">
                                      <div class="btn-group">
                                          <a href="{{route('user.edit',$transaction->id)}}" class="btn-info btn-xs btn-round" title="print invoice"><i class="fa fa-print"></i></a>
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

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title alert alert-dark btn-dark">
                  <h2>Advance Payment History</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

                  {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all1" class="flat">
                          </th>
                          <th class="column-title">No </th>
                          <th class="column-title">Paid Amount </th>
                          <th class="column-title"> Paid Date </th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employee_advance_salary as $transaction)
                            <tr>
                                <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records" value="{{$transaction->id}}">
                                </td>
                                <td>{{$loop -> index+1 }}</td>
                                <td><i class="fa fa-usd"></i> {{$transaction ->amount }}</td>
                                <td>{{$transaction ->date }}</td>
                                <td class="no-print">
                                    <div class="btn-group">
                                        <a href="{{route('user.edit',$transaction->id)}}" class="btn-info btn-xs btn-round" title="print Advance Invoice"><i class="fa fa-print"></i></a>
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
        {{-- </div> --}}

        {{-- <div class="row"> --}}
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title alert alert-dark btn-dark">
                  <h2>OverTime Payment History</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

                  {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all1" class="flat">
                          </th>
                          <th class="column-title">No </th>
                          <th class="column-title">Paid Amount </th>
                          <th class="column-title">Paid Date </th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employee_overtime_salary as $transaction)
                            <tr>
                                <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records" value="{{$transaction->id}}">
                                </td>
                                <td>{{$loop -> index+1 }}</td>
                                <td><i class="fa fa-usd"></i> {{$transaction ->overtime_amount }}</td>
                                <td>{{$transaction ->overtime_date }}</td>
                                <td class="no-print">
                                    <div class="btn-group">
                                        <a href="{{route('user.edit',$transaction->id)}}" class="btn-info btn-xs btn-round" title="Print Overtime Invoice"><i class="fa fa-print"></i></a>
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

        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title alert alert btn-">
                  <h2>Bonus Payment History</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

                  {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all1" class="flat">
                          </th>
                          <th class="column-title">No </th>
                          <th class="column-title">Paid Amount </th>
                          <th class="column-title">Paid Date </th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employee_bonus_salary as $transaction)
                            <tr>
                                <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records" value="{{$transaction->id}}">
                                </td>
                                <td>{{$loop -> index+1 }}</td>
                                <td><i class="fa fa-usd"></i> {{$transaction ->bonus_amount }}</td>
                                <td>{{$transaction ->bonus_date }}</td>
                                <td class="no-print">
                                    <div class="btn-group">
                                        <a href="{{route('user.edit',$transaction->id)}}" class="btn-info btn-xs btn-round" title="print bonus invoice"><i class="fa fa-print"></i></a>
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
        </div>
    </div>
        @endsection

          