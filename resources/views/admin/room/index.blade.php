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
                            <h3 class="m-0">Rooms</h3>
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
                                            <a href="{{ route('addRoom')}}" class="btn btn-success float-right"><i class="fa fa-add"></i> Add room</a> 
                                        </div>
                                            <div class="table-responsive">  
                                                <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr> 
                                                            <th>#</th>
                                                            <th>Room name</th>
                                                            <th>Location</th>
                                                            <th>Price Per week</th> 
                                                            <th>Status</th> 
                                                            <th>Action</th>                                   
                                                            <th>Action</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($rooms as $index=>$room)
                                                            <tr>
                                                                <td>{{$index+1}}</td>
                                                                <td>{{$room->name}}</td>
                                                                <td>{{$room->dormitory->name}}</td>
                                                                <td>{{$room->price}}</td>
                                                                <td>{{$room->status == '1' ? 'Availabe' : 'Taken'}}</td>
                                                                <td><a href="/admin/room/view/{{$room->id}}" class="btn btn-secondary"><i class="fa fa-eye"></i> Details</a></td>
                                                                <td><a href="/admin/room/{{$room->id}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a></td>
                                                                <td><a href="/admin/room/delete-room/{{$room->id}}" onclick="return confirm('Are you sure you want to delete this room?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
@include('admin.includes.footer')