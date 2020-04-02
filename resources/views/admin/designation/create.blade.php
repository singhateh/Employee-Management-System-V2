
  <!-- Modal -->
  <div class="modal fade" id="Designation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#1F262D; color:#fff">
          <h5 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Assign Designation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('designation.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
             </div>
        </div>
        <div class="panel-body">
                @csrf
                <div class="form-row">
                    <div class="col-sm-6">
                    <select type="text" name="employee_name" class="form-control" id="fname" placeholder="Enter a salary amount">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" {{ old('user') ? 'selected' : '' }}>{{$user->username}}</option>
                        @endforeach
                    </select>
                    </div>
                        <div class="col-sm-6">
                            <input type="text" name="designation" class="form-control" id="fname" placeholder="Enter a designation type">
                        </div>
                </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Assign Designation</button>
        </div>
    </form>
      </div>
    </div>
    </div>
  {{-- </div> --}}