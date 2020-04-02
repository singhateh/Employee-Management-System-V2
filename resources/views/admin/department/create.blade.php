
  <!-- Modal -->
  <div class="modal fade" id="Department" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#1F262D; color:#fff">
          <h5 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Assign Designation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('department.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
             </div>
        </div>
        <div class="panel-body">
                @csrf
                <div class="form-row">
                    <div class="col-sm-6">
                        <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Enter Department Name">
                    </div>
                        <div class="col-sm-6">
                            <input type="text" name="department_code" class="form-control" id="department_code" placeholder="Enter Department Code">
                        </div>
                </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Create Department</button>
        </div>
    </form>
      </div>
    </div>
    </div>
  </div>