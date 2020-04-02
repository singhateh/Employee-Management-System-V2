
  <!-- Modal -->
  <div class="modal fade" id="Salary" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#eee; color:#0000">
          <h3 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:black">Assign Employee Salary</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('salary.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><span class="glyphicon glyphicon-pencil"></span> Details</h2>
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
              
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select type="text" name="salary" class="form-control" id="salary">
                                <option value="" selected disabled>Select Salary</option>
                                @foreach($users as $user)
                                    <option>{{$user -> first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <input type="text" name="salary_amount" class="form-control" placeholder="Enter Salary Amount">
                        </div>
                </div>
            </div>
            </div>
        </div>

    </div>
  {{-- </div> --}}
                <div class="clearfix"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Register Employee</button>
        </div>
    </form>
      </div>
    </div>
    </div>
  </div>


<script>
$('')  
</script>    