<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.includes.head')
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
.image-upload > input {
  visibility:hidden;
  width:0;
  height:0
}

.noActive{
color: #31708f !important;
background-color: #ffff;
}

.noActiveStatus{
color: #31708f !important;
background-color: #fff;
}

#gender_radio{
  #
}

.glyphicon.glyphicon-picture {
    font-size: 50px;
}
    </style>
  </head>
 
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('/uploads/gallery/' .Auth::user()->image) }}" alt="..." height="50" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->first_name. ' '.Auth::user()->last_name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            @yield('css')
            <!-- sidebar menu -->
            @include('admin.includes.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('admin.includes.footer-menu')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('admin.includes.navigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.includes.footer')
        <!-- /footer content -->
      </div>
    </div>
 
    @yield('js')
    @include('admin.includes.scripts')



  </body>
</html>
