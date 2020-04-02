@extends('admin.layout.master')

@section('content')
{{-- 
    <div id="main-wrapper">
        <div class="page-wrapper"> --}}

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Designation Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('designation')}}">Designation</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


                <div class="col-md-6 pull-left">
                    @include('admin.includes.flash_message')
                </div>
                <br><br>
               
                    @include('admin.designation.create')
                   <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title alert alert-dark btn-dark">
                          <h2>List of Designations</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <div class="col-md-2" style="float:right; margin-right:7%;">
                                    <a class="btn btn-lg btn-dark btn-sm pull-right" href="#" data-toggle="modal" data-target="#Designation"> <i class="fa fa-plus"></i> Assign Designation</a>
                                </div>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
        
                        <div class="x_content">           
                   
                   <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Employe name</th>
                                            <th>Designation type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($designations as $designation)
                                        <tr>
                                            <td>{{$designation ->users->username }}</td>
                                            <td>{{$designation->designation_type}}</td>
                                            <td>
                                                <form id="delete-form-{{$designation->id}}" action="{{route('designation.delete',$designation->id)}}" method="put">
                                                    @csrf
                                                    @method('DELETE')
                                                       <a href="{{route('designation.edit',$designation->id)}}" class="btn btn-sm btn-dark">Edit</a>
                                                    <button type="button" onclick="deletePost({{$designation->id}})" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    {{ $designations->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

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

        </div>

    </div>

@endsection