@extends('admin.layout.master')

@section('content')

   <h1>{{ $users }}</h1>

    @endsection

    {{-- @section('js') --}}
                
    <script>
        $('.view-data').click(function(){
            var username=$(this).attr('username');
            var role=$(this).attr('role');
            var email=$(this).attr('email');
            var salary=$(this).attr('salary');
            var phone=$(this).attr('phone');
            var address=$(this).attr('address');
            var gender=$(this).attr('gender');
            var dob=$(this).attr('dob');
            var join_date=$(this).attr('join_date');
            var job_type=$(this).attr('job_type');
            var city=$(this).attr('city');
            var age=$(this).attr('age');
            $('#username').text(username);
            $('#role').text(role);
            $('#email').text(email);
            $('#salary').text(salary);
            $('#phone').text(phone);
            $('#address').text(address);
            $('#gender').text(gender);
            $('#dob').text(dob);
            $('#join_date').text(join_date);
            $('#job_type').text(job_type);
            $('#city').text(city);
            $('#age').text(age);
            // $('#show-data').show();
            alert(1)
        })


