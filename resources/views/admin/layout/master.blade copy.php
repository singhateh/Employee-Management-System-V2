<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    @include('admin.includes.head')
    @yield('css')

    <style>
.image-upload > input {
  visibility:hidden;
  width:0;
  height:0
}
    </style>
</head>
<body>
    {{--<div class="preloader">--}}
        {{--<div class="lds-ripple">--}}
            {{--<div class="lds-pos"></div>--}}
            {{--<div class="lds-pos"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div id="main-wrapper">
       @include('admin.includes.navigation')
       @include('admin.includes.sidebar')

       @yield('content')

       @include('admin.includes.footer')
    </div>
    @include('admin.includes.scripts')

        @yield('js')

        <script>
           //---------------------Browse image----------------
           $('#browse_file').on('click',function(){
                            $('#file-input').click();                 
                        })
                        $('#file-input').on('change', function(e){
                            showFile(this, '#showImage');
                        })

                        //---------------------------------------
                        function showFile(fileInput,img,showName){
                            if (fileInput.files[0]){
                                var reader = new FileReader();
                                reader.onload = function(e){
                                    $(img).attr('src', e.target.result);
                                }
                                reader.readAsDataURL(fileInput.files[0]);
                            }
                            $(showName).text(fileInput.files[0].name)
                        };
                        // $('.datepicker').datepicker();
                        $('#dob').datepicker({
                        // format: 'YYYY-MM-DD',
                        useCurrent: false,
                        format: 'yyyy-mm-dd',
                        startDate: '-3d'
                    })

                    $('#jdate').datepicker({
                        // format: 'YYYY-MM-DD',
                        useCurrent: true,
                        format: 'yyyy-mm-dd',
                        startDate: '-3d'
                    })

        </script>
</body>

</html>