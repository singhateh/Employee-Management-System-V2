
<style>
    .color{
        background-color:silver
    }
    </style>
    <div class="accordian-body collapse " id="demo{{$key}}">
        <table id="datatable-keytable" class="table table-striped table-hover"> 
            <thead class="color">
                <tr>
                    <th style="text-align: center;" class="color1">Address</th>
                    <th style="text-align: center;" class="color1">Gender</th>
                    <th style="text-align: center;" class="color1">DoB</th>
                    <th style="text-align: center;" class="color1">Join date</th>
                    <th style="text-align: center;" class="color1">City</th>
                    <th style="text-align: center;" class="color1">Action</th>
    
                </tr>
            </thead>
    
            <tbody>
                <tr>
 
                    <td style="text-align: center;">{{$employee->address}}</td>
                    <td style="text-align: center;">{{$employee->gender}}</td>
                    <td style="text-align: center;">{{date('d-m-Y', strtotime($employee->dob))}}</td>
                    <td style="text-align: center;">{{date('d-m-Y', strtotime($employee->join_date))}}</td>
                    <td style="text-align: center;">{{$employee->city}}</td>
                    {{-- <td style="text-align: center;">{{$employee->age}}</td> --}}
    
                    <td style="text-align: center;width:120px;">
                    <a href="{!! url('print-employee-single', [$employee->id]) !!} " title="Print" target="_blank" class='btn btn-default btn-sm'><i class="fa fa-print"></i></a>
                    <a href="{!! url('fee-collection-payment', [$employee->id]) !!} " title="salary" target="_blank" class='btn btn-default btn-sm'><i class="fa fa-tag"></i></a>
                    {{-- <a href="{!! route('employee.edit', [$employee->id]) !!}" title="Edit" class='btn btn-primary btn-sm'><i class="fa fa-edit"></i></a> --}}
                    </td>
                </tr>
              
            </tbody>
        </table>
    </div>
    {{-- </div> --}}
</div>