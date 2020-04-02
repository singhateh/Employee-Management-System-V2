
  <!-- Modal -->
  <div class="modal fade" id="State" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#eee; color:#0000">
          <h3 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:black">Add New State</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                        <form action="{{route('state.store')}}" method="post" class="form-horizontal">
                            @csrf
                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" name="city_name" class="form-control" id="fname" placeholder="Enter a department name">
                                    </div>
                                
                                    <div class="col-md-6 col-sm-12">
                                      <select name="state" id="state" class="form-control">
                                          <option value=""selected disabled>Select Country</option>
                                          @foreach ($country as $country)
                                      <option value="{{$country->id}}">{{$country->name}}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>
                <div class="clearfix"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Register Employee</button>
        </div>
    </form>
      </div>
    </div>
    </div>
  {{-- </div> --}}
