
@extends('admin.layout.master')

@section('content')

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Employee Document</h3>
      </div>
      @include('admin.includes.flash_message')
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
          <h2>Document Upload <small>Portal</small></h2>
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
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          {{-- <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p> --}}
          <form action="{{ route('user.upload_image') }}" class="dropzone">
            @csrf

          <input type="hidden" name="user_id" value="{{$employment_image->id}}">
          </form>
          <br />
          <br />
         
          <br />
          <br />
        </div>
    </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-user fa-lg"></i> {{$employment_image->first_name.' '.$employment_image->last_name}} Document List</h2>
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
                    <th>N<sup>0</sup></th>
                    <th>Document Name</th>
                    <th>Document Size</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($employee_document as $key => $document)
                    <tr>
                        <th>{{$loop->index+1}}</th>
                        <td>{{$document->document_name }} </td>
                        <td style="display:none">{{$document->document_unique_name }}</td>
                        <td>{{$document->document_size }} </td>
                        <td >
                            <a href="{{route('user.edit',$document->id)}}" class="btn btn-sm btn-round btn-dark"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-sm btn-round btn-dark accordion-toggle"  data-toggle="collapse"
                              data-target="#demo{{$key}}" title="Preview Document"><i class="fa fa-eye"></i></a>
                            <a href="{{route('user.download_document',$document->document_unique_name)}}" class="btn btn-sm btn-round btn-success" title="Download Document"><i class="fa fa-download"></i></a>
                            <a href="#" onclick="deletePost({{ $document->id }})" class="btn btn-sm btn-round btn-danger"><i class="fa fa-trash"></i></a>
                            <form id="delete-form-{{ $document->id }}" action="{{route('user.delete_document',$document->id)}}" method="put">
                                @csrf
                                @method('DELETE')
                            </form>
                            {{-- <button type="button" </button> --}}
                        </td>
                    </tr>
                    <tr>
                      <td colspan="12" class="hiddenrow">
                          @include('admin.user.preview_document')
                      </td>
                  </tr>

                @endforeach
                </tbody>
            </table>

            <!-- Modal -->
<div class="modal fade" id="previewDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#eee; color:#0000">
          <h3 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:black">Add New User</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><iframe src="{{ asset('uploads/documents/' .$employment_image->document_name) }}" width="1280" height="590" frameborder="0"></iframe></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
  </div>
             {{-- <p><iframe src="{{ asset('uploads/documents/' .$document->document_name) }}" frameborder="0"></iframe></p> --}}
        </div>
    </div>
</div>
</div>
@endsection