
  <!-- Modal -->
  <div class="modal fade" id="Country" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#eee; color:#0000">
          <h3 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:black">Add New Country</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                        <form action="{{route('country.store')}}" method="post" class="form-horizontal">
                            @csrf
                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" name="country_name" class="form-control" id="country_name" placeholder="Enter Country Name">
                                    </div>

                                    <div class="col-md-3 col-sm-12">
                                      <input type="text" name="country_code" class="form-control" id="country_code" placeholder="Enter Country Code (max 3 word)">
                                  </div>

                                  <div class="col-md-3 col-sm-12">
                                    <input type="text" name="country_phonecode" class="form-control" id="country_phonecode" placeholder="Enter Country Phone Code">
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
