<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('uploads/users/'.Auth::user()->picture) }}" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded">
          <li class="user-header bg-secondary rounded">
            <img src="{{ asset('uploads/users/'.Auth::user()->picture) }}" class="img-circle elevation-2" alt="User Image">
            <p>{{ Auth::user()->name }}</p>
          </li>
          <li class="user-footer">
            <a href="#" class="btn btn-primary rounded">Profile</a>
            <a href="{{ route('staffLogout') }}" class="btn btn-danger float-right rounded">Sign out</a>
          </li> 
        </ul>
      </li>    
    </ul>   
</nav>