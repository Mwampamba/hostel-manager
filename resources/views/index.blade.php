@include('front-includes.header')
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home')}}">Hostel Manager</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="navbar-brand" aria-current="page" href="{{ route('createStudentBooking')}}">Booking |</a>
              </li>
              <li class="nav-item">
                <a class="navbar-brand" href="#">Gallery |</a>
              </li>
              @if(Session::has('student'))
                <li class="nav-item">
                  <a class="navbar-brand" href="{{ route('studentLogout')}}">Sign out</a>
              @else
              <li class="nav-item">
                <a class="navbar-brand" href="{{ route('registerStudent')}}">Sign up </a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
      <section class="section-intro padding-y-sm">
        <div class="container">
          <div class="intro-banner-wrap">
            <div id="sliderShow" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#sliderShow" data-slide-to="0" class="active"></li>
                <li data-target="#sliderShow" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                <a href="{% url 'store' %}" class="img-wrap"><img src="{{ asset('banner/banner-1.jpg') }}" class="img-fluid rounded"></a>
                </div>
                <div class="carousel-item">
                <a href="{% url 'store' %}" class="img-wrap"><img src="{{ asset('banner/banner-3.jpg') }}" class="img-fluid rounded"></a>
                </div>
              </div>
              
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </div>
        </div>
      </section>
     

      <!-- Welcome message -->
      <div class="container my-4">
        <h1 class="text-center border-bottom">Welcome message</h1>
          <div class="row my-4">
              <div class="col-md-4">
                <img src="{{asset('banner/welcome.png')}}" class="img-thumbnail rounded" alt="">
              </div>
            <div class="col-md-8">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi odit magnam iusto expedita architecto suscipit rerum, sapiente fugiat quia molestias cum sit tempora ex quo. Recusandae odio explicabo eum tempore.
              </p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi odit magnam iusto expedita architecto suscipit rerum, sapiente fugiat quia molestias cum sit tempora ex quo. Recusandae odio explicabo eum tempore.
              </p>
            </div> 
          </div>
      </div>
      <!-- Gallery -->
      <div class="container my-4">
        <h1 class="text-center border-bottom">Rooms gallery</h1>
        <div class="row my-4">
          @foreach ($rooms as $room)
          <div class="col-md-3">
            <div class="card">
              <h5 class="card-header">{{ $room->name }}</h5>
              <div class="card-body">
                @if($room->room_images)
                  @foreach($room->room_images as $index => $image)
                  <a href="{{asset($image->image_path)}}" data-lightbox="{{$room->id}}">
                    @if($index > 0)
                      <img class="img-fluid hide-image rounded" src="{{asset($image->image_path)}}" style="width:235px;height:200px" /></a>
                    @else
                    <img class="img-fluid rounded" src="{{asset($image->image_path)}}" style="width:235px;height:200px" /></a>
                    @endif
                    @endforeach
                @else
                    <h5>No image were added!</h5>
                @endif
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>

@include('front-includes.footer')