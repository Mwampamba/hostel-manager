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
                                <h3 class="m-0">Bookings</h3>
                            </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active">Bookings</li>
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
                                                <a href="{{ route('createBooking')}}" class="btn btn-success float-right"><i class="fa fa-add"></i>New booking</a> 
                                            </div>
                                                <div class="table-responsive">  
                                                    <table id="myDataTable" class="table table-bordered">
                                                        <thead>
                                                            <tr> 
                                                                <th>#</th>
                                                                <th>Student name</th>
                                                                <th>Class</th>
                                                                <th>Collage</th>
                                                                <th>Room</th>  
                                                                <th>Booking date</th>
                                                                <th>Check-in</th>
                                                                <th>Check-out</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($bookings as $index=>$booking)
                                                                <tr>
                                                                    <td>{{ $index+1 }}</td>
                                                                    <td>{{ $booking->student->name }}</td>
                                                                    <td>{{ $booking->student->class }}</td>
                                                                    <td>{{ $booking->student->collage }}</td>
                                                                    <td>{{ $booking->room->name }}</td>
                                                                    <td>{{ $booking->student->created_at->format('Y-m-d'); }}</td>
                                                                    <td>{{ $booking->check_in }}</td>
                                                                    <td>{{ $booking->check_out }}</td>
                                                                    <td><a href="/admin/bookings/{{$booking->id}}" class="btn btn-secondary"><i class="fa fa-eye"></i> Details</a></td>
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