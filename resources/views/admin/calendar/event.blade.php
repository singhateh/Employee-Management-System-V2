@extends('admin.layout.master')

@section('content')
{{-- 
<div id="main-wrapper">

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">

                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Calendar</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <h4 class="page-title">Calendar</h4>
                    <div class="jumbotron">
                        <div class="row">
                            @can('isAdmin')
                            <a href="{{url('calendar/add')}}" class="btn btn-success">Add events</a>
                            @endcan
                             <a href="{{url('calendar/edit')}}" class="btn btn-warning">Edit events</a>
                            <a href="#" class="btn btn-danger">Delete events</a>
                         </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #2e642e; color: white">
                                        Full calendar
                                    </div>
                                    <div class="panel-body">
                                        {!! $calendar->calendar() !!}
                                        {!! $calendar->script() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
            </div>
        </div>
    </div>  --}}
    <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Calendar <small>Click to add/edit events</small></h3>
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
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Calendar Events <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  {{-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li> --}}
                  <div class="form-group">
                      {{-- <div class="col-md-6"></div> --}}
                  <li>
                    @can('isAdmin')
                    <a href="#" class="btn btn-sm btn-round btn-success" data-toggle="modal" data-target="#CalenderModalNew">Add events</a>
                     <a href="#" class="btn btn-sm btn-round btn-warning" data-toggle="modal" data-target="#CalenderModalEdit">Edit events</a>
                    <a href="#" class="btn btn-sm btn-round btn-danger" data-toggle="modal" data-target="#CalenderModalDelete">Delete events</a>
                    @endcan
                </i></a>
                  </li>
                </div>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
  
              </div>
            </div>
          </div>
        </div>
      </div>


        <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
            </div>
            <div class="modal-body">
                    
              <div id="testmodal" style="padding: 5px 20px;">
                <form action="{{url('calendar/store')}}" method="post" class="form-horizontal calender">
                    @csrf

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Choose Code</label>
                        <div class="col-sm-9">
                          <input type="color" class="form-control" id="color" name="color" placeholder="Choose Code ">
                        </div>
                      </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Event ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="descr" name="description" placeholder="Enter Destription"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-4">
                  <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date ">
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End  Date ">
                    </div>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-round antoclose" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-dark btn-round antosubmit">Save Event</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">
  
              <div id="testmodal2" style="padding: 5px 20px;">
                <form id="antoform2" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title2" name="title2">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                    </div>
                  </div>
  
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
          </div>
        </div>
      </div>
  
      <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
      <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
      <!-- /calendar modal -->

@endsection