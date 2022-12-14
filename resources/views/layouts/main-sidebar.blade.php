<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
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
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header">MASTER</li>
      <li><a href="{{ route('departments.index') }}"><i class="fa fa-building-o"></i> <span>Departments</span></a></li>
      <li><a href="{{ route('specialists.index') }}"><i class="fa fa-sitemap"></i> <span>Specialists</span></a></li>
      <li><a href="{{ route('ambulances.index') }}"><i class="fa fa-ambulance"></i> <span>Ambulances</span></a></li>
      <li><a href="{{ route('doctors.index') }}"><i class="fa fa-user-md"></i> <span>Doctors</span></a></li>
      <li><a href="{{ route('nurses.index') }}"><i class="fa fa-users"></i> <span>Nurses</span></a></li>
      <li><a href="{{ route('patients.index') }}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a></li>
      <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
