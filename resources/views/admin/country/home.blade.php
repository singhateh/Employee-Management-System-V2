@extends('admin.layout.master')

@section('content')
     @include('admin.country.create')
     @include('admin.city.create')
     @include('admin.state.create')
    <div class="row">

        <div class="col-md-12 col-sm-6 col-xs-12">

            <div class="x_panel">
              <div class="x_title alert alert-dark btn-dark">
                <h2>Counties Table</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li>
                    <div class="col-md-2" style="float:right">
                        <a class="btn btn-round btn-sm btn-dark pull-right" href="#" data-toggle="modal" data-target="#Country"><i class="fa fa-plus"></i> Create Country</a>
                      </div>
                 </li>
                </ul>
                <div class="clearfix"></div>
              </div>
    
              <div class="x_content">
    
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        {{-- <table id="zero_config" class="table table-striped table-bordered"> --}}
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Country</th>
                                <th>Phone Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$loop -> index+1 }}</td>
                                    <td>{{$country->code}}</td>
                                    <td>{{$country->name}}</td>
                                    <td>{{$country->phonecode}}</td>
                                    <td>
                                        <form id="delete-form-{{$country->id}}" action="{{route('country.delete',$country->id)}}" method="put">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('country.edit',$country->id)}}" class="btn btn-sm btn-round btn-default"><i class="fa fa-print"></i></a>
                                            <a href="{{route('country.edit',$country->id)}}" class="btn btn-sm btn-round btn-info"> <i class="fa fa-edit"></i></a>
                                            <button onclick="deletePost({{$country->id}})" type="button" class="btn btn-sm btn-round btn-danger"> <i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="ln_solid"></div>
                        {{ $countries->links() }}
                </div>
                        
                    
              </div>
            </div>
          </div>
        </div>
<div class="row">
     <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title alert alert-primary btn-primary">
            <h2>City Table</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li>
                <div class="col-md-2" style="float:right">
                    <a class="btn btn-round btn-sm btn-primary pull-right" href="#" data-toggle="modal" data-target="#City"><i class="fa fa-plus"></i> Create City</a>
                  </div>
             </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content collapse">

            <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                    {{-- <table id="zero_config" class="table table-striped table-bordered"> --}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{$loop -> index+1 }}</td>
                                <td>{{$city->city_name}}</td>
                                <td>{{$city->state_name}}</td>
                                <td>
                                    <form id="delete-form-{{$city->id}}" action="{{route('city.delete',$city->id)}}" method="put">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-round btn-default"><i class="fa fa-print"></i></a>
                                        <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-round btn-info"> <i class="fa fa-edit"></i></a>
                                        <button onclick="deletePost({{$city->id}})" type="button" class="btn btn-sm btn-round btn-danger"> <i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="ln_solid"></div>
                    {{ $cities->links() }}
            </div>
                    
                
          </div>
        </div>
      </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
           <div class="x_panel">
             <div class="x_title alert alert-success btn-success">
               <h2>State Table</h2>
               <ul class="nav navbar-right panel_toolbox">
                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                 </li>
                 <li>
                    <div class="col-md-2" style="float:right">
                        <a class="btn btn-round btn-sm btn-success pull-right" href="#" data-toggle="modal" data-target="#State"><i class="fa fa-plus"></i> Create State</a>
                      </div>
                 </li>
               </ul>
               <div class="clearfix"></div>
             </div>
   
             <div class="x_content collapse">
   
               {{-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> --}}
   
               <div class="table-responsive">
                   <table id="example" class="display" style="width:100%">
                       {{-- <table id="zero_config" class="table table-striped table-bordered"> --}}
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>State</th>
                               <th>Country</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($states as $state)
                               <tr>
                                   <td>{{$loop -> index+1 }}</td>
                                   <td>{{$state->state_name}}</td>
                                   <td>{{$state->country_name}}</td>
                                   <td>
                                       <form id="delete-form-{{$state->id}}" action="{{route('state.delete',$state->id)}}" method="put">
                                           @csrf
                                           @method('DELETE')
                                           <a href="{{route('state.edit',$state->id)}}" class="btn btn-sm btn-round btn-default"><i class="fa fa-print"></i></a>
                                           <a href="{{route('state.edit',$state->id)}}" class="btn btn-sm btn-round btn-info"> <i class="fa fa-edit"></i></a>
                                           <button onclick="deletePost({{$state->id}})" type="button" class="btn btn-sm btn-round btn-danger"> <i class="fa fa-trash"></i></button>
                                       </form>
                                   </td>
                               </tr>
                           </tbody>
                           @endforeach
                       </table>
                       <div class="ln_solid"></div>
                       {{ $states->links() }}
               </div>
                       
                   
             </div>
           </div>
         </div>
       </div>

@endsection