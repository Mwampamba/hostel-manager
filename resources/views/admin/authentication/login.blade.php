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
            <p class="login-box-msg">Sign in to start your session</p>
              <form action="{{ route('postLogin')}}" method="post">
                @csrf
                <div class="input-group mb-2">
                  <input type="email" name="email" class="form-control" placeholder="Enter your email">
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
                  <input type="password" name="password" class="form-control" placeholder="Enter your password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                  <div class="col-6">
                    <p class="mb-1">
                      <a href="#">New user? register</a>
                    </p>
                  </div>
                  <div class="col-6">
                    <p class="mb-1">
                      <a href="{{ route('getForgotPassword') }}">Forgot password?</a>
                    </p>
                  </div>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
