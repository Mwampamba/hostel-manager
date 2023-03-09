@php
  $current_route = request()->route()->getName();
@endphp
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
    </a>
    <a href="{{route('dashboard')}}" class="brand-link">
      <span class="brand-text font-weight-light">Hostel Management System</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ $current_route == 'dashboard'?'active':''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
              </li> 
              <li class="nav-header">BOOKING MANAGEMENT</li>
                  <li class="nav-item {{ $current_route == 'bookings'?'menu-open':''}}">
                <a href="{{ route('bookings')}}" class="nav-link {{ $current_route == 'bookings'?'active':''}}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    BOOKING
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('bookings')}}" class="nav-link {{ $current_route == 'bookings'?'active':''}}">
                      <i class="nav-icon fa fa-book"></i>
                      <p>View Bookings</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header">DORMITORY MANAGEMENT</li>
              <li class="nav-item {{ $current_route == 'dormitories'?'menu-open':''}}">
            <a href="#" class="nav-link {{ $current_route == 'dormitories'?'active':''}}">
              <i class="nav-icon fas fa-house"></i>
              <p>
                DORMITORIES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addDormitory')}}" class="nav-link {{ $current_route == 'addDormitory'?'active':''}}">
                  <i class="nav-icon fa fa-house"></i>
                  <p>Add Dormitory </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dormitories')}}" class="nav-link {{ $current_route == 'dormitories'?'active':''}}">
                  <i class="nav-icon fa fa-house"></i>
                  <p>View Dormitories</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-header">ROOM MANAGEMENT</li>
                  <li class="nav-item {{ $current_route == 'rooms'?'menu-open':''}}">
                <a href="#" class="nav-link {{ $current_route == 'rooms'?'active':''}}">
                  <i class="nav-icon fas fa-house"></i>
                  <p>
                    ROOMS
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('addRoom')}}" class="nav-link {{ $current_route == 'addRoom'?'active':''}}">
                      <i class="nav-icon fa fa-hotel"></i>
                      <p>Add Room </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('rooms')}}" class="nav-link {{ $current_route == 'rooms'?'active':''}}">
                      <i class="nav-icon fa fa-house"></i>
                      <p>View All Rooms</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-header">STUDENT MANAGEMENT</li>
                <li class="nav-item {{ $current_route == 'categories'?'menu-open':''}}">
                      <a href="#" class="nav-link {{ $current_route == 'categories'?'active':''}}">
                  <i class="nav-icon  fa fa-users"></i>
                    <p>
                        ALL STUDENTS
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('students')}}" class="nav-link {{ $current_route == 'students'?'active':''}}">
                  <i class="nav-icon fas fa fa-users"></i>
                  <p>Students Management</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">STAFF MANAGEMENT</li>
          <li class="nav-item {{ $current_route == 'users'?'menu-open':''}}">
                <a href="#" class="nav-link {{ $current_route == 'users'?'active':''}}">
            <i class="nav-icon  fa fa-users"></i>
              <p>
                  ALL STAFFS
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
          <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('users')}}" class="nav-link {{ $current_route == 'users'?'active':''}}">
            <i class="nav-icon fas fa fa-users"></i>
            <p>Staffs Management</p>
          </a>
        </li>
      </ul>
   
  </nav>
  </div>
</aside>
