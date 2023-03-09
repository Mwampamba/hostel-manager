@include('admin.includes.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0">Room details</h3>
                    </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Rooms</li>
                            </ol>
                        </div>
                </div>
            </div>
        </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <a href="{{route('rooms')}}" class="btn btn-danger float-right">BACK</a> 
                                            <a href="{{route('rooms')}}" class="btn btn-secondary float-left"><i class="fas fa-download"></i> Generate PDF</a> 
                                        </h4>
                                    </div>
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                              <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Room name</th>
                                                        <th>Location</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($room_data as $index=>$room)
                                                    <tr>
                                                        <td>{{$room->name}}</td>
                                                        <td>{{$room->dormitory->name}}</td>
                                                        <td>{{$room->price}}</td>
                                                        <td>{{$room->status == '1' ? 'Availabe' : 'Taken'}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-12">
                                                <p class="lead">Image Gallery:</p>
                                                <div>
                                                    @if($room->room_images)
                                                        @foreach($room->room_images as $image)
                                                            <img src="{{asset($image->image_path)}}" 
                                                                style="width:350px;height:200px" class="me-4 border rounded">
                                                        @endforeach
                                                    @else
                                                        <h5>No image were added!</h5>
                                                    @endif
                                                </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div> 
                                </div>
                        </div>
                    </div>
        </section>
    </div>
    @include('admin.includes.footer')