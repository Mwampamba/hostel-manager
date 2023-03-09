@include('admin.includes.header')
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="card">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="{{ route('home')}}" class="h1"><b>Hostel </b>Manager</a>
          </div>
    <div class="card-body">
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
      @endif
      @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
      @endif
      <p class="login-box-msg">Write email to recover your account</p>
      <form action="{{ route('postForgotPassword')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <p class="mb-1">
              <a href="{{ route('getLogin')}}" class="text-center">I already have a membership</a>
            </p>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}">"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}">"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
