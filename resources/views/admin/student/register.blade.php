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
          <p class="login-box-msg">Sign up to book your room</p>
      <form action="{{ route('saveStudent')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Enter your  full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> 
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="text" name="phone" class="form-control" placeholder="Enter your phone number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <select name="collage" class="form-control selection">
              <option value="">Select your collage</option>
              <option value="CoET">CoET</option>
              <option value="CoBA">CoBA</option>
          </select>
      </div>
      @error('collage')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        <div class="input-group mb-3">
          <select name="sex" class="form-control selection">
              <option value="">Select your sex</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
          </select>
      </div>
      @error('sex')
        <div class="text-danger">{{ $message }}</div>
      @enderror
      <div class="input-group mb-3">
        <select name="class" class="form-control selection">
            <option value="">Select your class</option>
            <option value="First year">First year</option>
            <option value="Second year">Second year</option>
            <option value="Third year">Third year</option>
            <option value="Fourth year">Fourth year</option>
        </select>
    </div>
    @error('class')
      <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="input-group mb-3">
      <select name="programme" class="form-control selection">
          <option value="">Select your programme of Study</option>
          <option value="BSc. in Computer Engineering and IT">BSc. in Computer Engineering and IT</option>
          <option value="BSc. in Business Administration">BSc. in Business Administration</option>
      </select>
  </div>
  @error('programme')
    <div class="text-danger">{{ $message }}</div>
  @enderror

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a href="{{ route('home')}}" class="text-center">Back home</a>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>  
    </div>
  </div>
</div>
</body>
</html>
