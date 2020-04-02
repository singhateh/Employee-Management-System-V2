<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard2')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard 2</span></a></li>
          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard3')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard 3</span></a></li>
          {{-- <li><a href="index2.html">Dashboard2</a></li>
          <li><a href="index3.html">Dashboard3</a></li> --}}
        </ul>
      </li>
      @can('isAdmin')
             
            
      {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('employee')}}" aria-expanded="false"><i class="fa fa-windows" aria-hidden="true"></i><span class="hide-menu">Employee Management</span></a></li> --}}
        {{-- <ul class="nav child_menu">
          <li><a href="form.html">General Form</a></li>
          <li><a href="form_advanced.html">Advanced Components</a></li>
          <li><a href="form_validation.html">Form Validation</a></li>
          <li><a href="form_wizards.html">Form Wizard</a></li>
          <li><a href="form_upload.html">Form Upload</a></li>
          <li><a href="form_buttons.html">Form Buttons</a></li>
        </ul> --}}
      </li>
      @endcan

      @can('isAdmin')
      {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('user')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">User Management</span></a></li> --}}
  <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span class="fa fa-chevron-down"></span> User Management</a>
      <ul aria-expanded="false" class="nav child_menu">
          <li class="sidebar-item"><a href="{{route('user')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Employee List </span></a></li>
          <li class="sidebar-item"><a href="{{route('user.create')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Employee </span></a></li>
      </ul>
  </li>
  @endcan

  @can('isAdmin')
      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-tags" aria-hidden="true"></i><span class="fa fa-chevron-down"></span> General Management</a>
          <ul aria-expanded="false" class="nav child_menu">
              <li class="sidebar-item"><a href="{{route('designation')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Designation </span></a></li>
              <li class="sidebar-item"><a href="{{route('department')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Department </span></a></li>
              <li class="sidebar-item"><a href="{{route('salary')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Salary </span></a></li>
              {{-- <li class="sidebar-item"><a href="{{route('city')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> City </span></a></li> --}}
              <li class="sidebar-item"><a href="{{route('county.home')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Country </span></a></li>
              {{-- <li class="sidebar-item"><a href="{{route('shift')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Shift </span></a></li> --}}
          </ul>
      </li>
  @endcan

      <li class="sidebar-item"><a href="{{route('user.project')}}" class="sidebar-link"><i class="fa fa-tasks "></i><span class="hide-menu">Projects</span></a></li>

      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-sort" aria-hidden="true"></i><span class="fa fa-chevron-down"></span>Leave management</a>
        <ul aria-expanded="false" class="nav child_menu">
            {{-- @can('isEmployee') --}}
            @can('isAdmin')
            {{-- <li class="sidebar-item"><a href="{{route('leave.create')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Apply Leave</span></a></li> --}}
            @endcan
            <li class="sidebar-item"><a href="{{route('leave')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Leave list</span></a></li>
            {{-- <li class="sidebar-item"><a href="{{route('total-leave')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Total leave list</span></a></li> --}}
        </ul>
    </li>

    <li class="sidebar-item"><a href="{{route('user.salary')}}" class="sidebar-link"><i class="fa fa-money"></i><span class="hide-menu">Salary</span></a></li>

    @can('isAdmin')
    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-credit-card " aria-hidden="true"></i><span class="fa fa-chevron-down"> </span> Payroll management</a>
        <ul aria-expanded="false" class="nav child_menu">
            {{-- <li class="sidebar-item"><a href="{{route('managesalary')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Manage salary details </span></a></li> --}}
            <li class="sidebar-item"><a href="{{route('managesalary.salarylist')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Employee salary list</span></a></li>
            {{-- <li class="sidebar-item"><a href="{{route('payroll.list')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Employee salary list </span></a></li> --}}
            {{-- <li class="sidebar-item"><a href="{{route('payroll.payment')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Make payment </span></a></li> --}}
            {{-- <li class="sidebar-item"><a href="{{route('payroll.payslip')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Generate payslip </span></a></li> --}}
        </ul>
    </li>
    @endcan
    <li class="sidebar-item"><a href="{{route('calendar')}}" class="sidebar-link"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hide-menu"> Calendar </span></a></li>

    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('download')}}" aria-expanded="false"><i class="fa fa-cloud-download"></i><span class="hide-menu">Downloads</span></a></li>

    </ul>
  </div>
  <div class="menu_section">
    <h3>Live On</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
      {{-- <li class="sidebar-item"> <span class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-cogs " aria-hidden="true"> </i> <span class="hide-menu"> Settings</span></span> --}}
        <ul aria-expanded="false" class="nav child_menu">
            <li class="sidebar-item"><a href="{{route('profile')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> My profile </span></a></li>
            <li class="sidebar-item"><a href="{{route('change.password')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Change Password </span></a></li>
        </ul>
    </li>
    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
        <li><a href="fixed_footer.html">Fixed Footer</a></li>
      </ul>
    </li>
    
      {{-- <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="page_403.html">403 Error</a></li>
          <li><a href="page_404.html">404 Error</a></li>
          <li><a href="page_500.html">500 Error</a></li>
          <li><a href="plain_page.html">Plain Page</a></li>
          <li><a href="login.html">Login Page</a></li>
          <li><a href="pricing_tables.html">Pricing Tables</a></li>
        </ul>
      </li> --}}
      {{-- <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="#level1_1">Level One</a>
            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="level2.html">Level Two</a>
                </li>
                <li><a href="#level2_1">Level Two</a>
                </li>
                <li><a href="#level2_2">Level Two</a>
                </li>
              </ul>
            </li>
            <li><a href="#level1_2">Level One</a>
            </li>
        </ul>
      </li>                   --}}
      {{-- <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li> --}}
    </ul>
  </div>

</div>
   