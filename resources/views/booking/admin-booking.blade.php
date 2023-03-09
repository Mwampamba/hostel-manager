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
                        <h3 class="m-0">Booking</h3>
                    </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Booking</li>
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
                                            <a href="{{route('bookings')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('saveBooking')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Student name<span class="text-danger"> *</span></label>
                                                    <select name="student" class="form-control selection">
                                                        <option value="">Select student name</option>
                                                        @foreach ($students as $student)
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('student')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Check-in<span class="text-danger"> *</span></label>
                                                    <input type="date" name="check_in" class="form-control checkin-date" />
                                                    @error('check_in')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Check-out<span class="text-danger"> *</span></label>
                                                    <input type="date" name="check_out" class="form-control checkout-date" />
                                                    @error('check_out')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="">Select available rooms<span class="text-danger"> *</span></label>
                                                    <select name="room" class="form-control room-list selection">
                                                        <option value="">--- Select room name ---</option>
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('room')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Confirm booking</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                        </div>
                    </div>
        </section>
    </div>
    @include('admin.includes.footer')