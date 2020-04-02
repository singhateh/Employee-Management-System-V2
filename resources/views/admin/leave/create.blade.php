
            <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
            
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <!-- Modal -->
  <div class="modal fade" id="Leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#1F262D; color:#fff">
          <h5 class="modal-title" id="exampleModalLongTitle" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Apply Leave</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('leave.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
            <div class="panel-body">
                @csrf
                <div class="form-row">
                        <div class="col-sm-12">
                            <input type="text" name="leave_type" class="form-control" id="fname" placeholder="Leave type">
                        </div>
                        <br><br>                    
                        <div class="col-sm-5">
                            <input type="text" min="{{date('Y-m-d')}}" name="date_from" class="form-control" id="FromDate">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="days" class="form-control" id="TotalDays" placeholder="days">
                         </div>
                        <div class="col-sm-5">
                            <input type="text" name="date_to" class="form-control" id="ToDate">
                        </div>
                        <br><br>
                       
                        <div class="col-sm-12">
                            <textarea type="text" name="reason" class="form-control" id="summary-ckeditor" placeholder="Reason"></textarea>
                        </div>
                </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Register User</button>
        </div>
    </form>
      </div>
    </div>
    </div>
  </div>





@section('js')
    <script>
     $(document).ready(function(){
        $("#ToDate").change(function () {
            var start = new Date($('#FromDate').val());
            var end = new Date($('#ToDate').val());

            var diff = new Date(end - start);
            var days=1;
            days = diff / 1000 / 60 / 60 / 24;

            // $('#TotalDays').val(days);
            if (days == NaN) {
                $('#TotalDays').val(0);
            } else {
                $('#TotalDays').val(days+1);
            }
        })

        $("#FromDate").change(function () {
            var start = new Date($('#FromDate').val());
            var end = new Date($('#ToDate').val());

            var diff = new Date(end - start);
            var days=1;
            days = diff / 1000 / 60 / 60 / 24;

            // $('#TotalDays').val(days);
            if (days == NaN) {
                $('#TotalDays').val(0);
            } else {
                $('#TotalDays').val(days+1);
            }
        })

        $('#ToDate').datetimepicker({
            format: 'YYYY-MM-DD',
             useCurrent: false,
            //  format: 'yyyy-mm-dd',
            //  startDate: '-3d'
        })

        $('#FromDate').datetimepicker({
            format: 'YYYY-MM-DD',
             useCurrent: false,
            //  format: 'yyyy-mm-dd',
            //  startDate: '-3d'
        })
     })
    </script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
    @endsection