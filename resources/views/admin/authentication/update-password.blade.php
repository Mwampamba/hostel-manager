@include('admin.includes.header')
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="card">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="{{ route('dashboard')}}" class="h1"><b>Hostel </b>Manager</a>
          </div>
    <div class="card-body">
        @if(Session::has('success'))
          <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif
      <p class="login-box-msg">Recover your password now</p>
      <form action="{{ route('updatePassword')}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group mb-2">
          <input type="email" name="email" value="{{ $email }}" class="form-control" placeholder="Enter your email" readonly />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div> 
          </div>
        </div>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-2">
            <input type="password" name="password" class="form-control" placeholder="Enter your new password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        {{-- <div class="input-group mb-2">
          <input type="password" name="repassword" class="form-control" placeholder="Repeat your new password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('repassword')
            <div class="text-danger">{{ $message }}</div>
        @enderror --}}
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="{{route('getLogin')}}">You have an account? login here</a>
      </p>
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
