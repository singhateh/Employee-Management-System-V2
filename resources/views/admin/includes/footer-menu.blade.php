<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a href="#"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="sidebar-link"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"></span>
      {{-- <span class="glyphicon glyphicon-off" aria-hidden="true"></span> --}}
    </a>
  </div>

  <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    @csrf
    
</form>
