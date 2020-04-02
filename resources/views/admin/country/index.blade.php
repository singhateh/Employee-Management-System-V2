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
     @include('admin.city.create')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">City</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('city')}}">City</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Create New <small>Employee</small></h2>
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
                        <div class="col-md-2" style="float:right">
                          <a class="btn btn-round btn-lg btn-dark pull-right" href="#" data-toggle="modal" data-target="#City"><i class="fa fa-plus"></i> Create City</a>
                        {{-- <a class="btn btn-round btn-lg btn-dark pull-right" href="{{route('city.create')}}" data-toggle="modal1" data-target1="#Employee"><i class="fa fa-plus"></i> Create Employee</a> --}}
                        </div>
         
                      </div>
                    </div>
                  </div>



                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Employee <small>List</small></h2>
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
                                                <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-round btn-default"><i class="fa fa-print"></i> Print</a>
                                                <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-round btn-info"> <i class="fa fa-edit"></i> Edit</a>
                                                <button onclick="deletePost({{$city->id}})" type="button" class="btn btn-sm btn-round btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            {{ $cities->links() }}
                        </div>
              </div>
            </div>
          </div>

     </div>
  </div>
  </div>
</div>

                {{-- <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-lg btn-dark" href="{{route('city.create')}}">Add city</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Salary List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
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
                                                        <a href="{{route('city.edit',$city->id)}}" class="btn btn-sm btn-dark">Edit</a>
                                                        <button onclick="deletePost({{$city->id}})" type="button" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $cities->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

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
            {{--sweetalert box for deleting end--}}

        </div>

    </div>

@endsection