<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset($datapic['dirprofile'] . $userpicloc) }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ ucwords(Auth::user()->name) }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li{!! $activedashboard !!}><a href="{{ url('dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
      <li{!! $activeroomsetting !!}><a href="{{ url('RoomSettings') }}"><i class="fa fa-link"></i> <span>Room Settings</span></a></li>
      <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
