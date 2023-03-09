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
                        <h3 class="m-0">Update room</h3>
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
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/admin/room/'.$room->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Room name</label>
                                                    <input type="text" name="room_name" class="form-control" value="{{ $room->name }}" placeholder="Room name" />
                                                    @error('room_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control selection">
                                                        <option value="1" {{ $room->status == '1' ? 'selected' : '' }}> Available </option>
                                                        <option value="0" {{ $room->status == '0' ? 'selected' : '' }}> Taken </option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Dormitory name</label>
                                                    <select name="dormitory_name" class="form-control selection">
                                                        <option value="">Select dormitory</option>
                                                        @foreach ($dormitories as $dormitory)
                                                            <option value="{{ $dormitory->id }}" {{ $dormitory->id == $room->dormitory_id ? 'selected' : '' }}> {{ $dormitory->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('dormitory_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Description</label> 
                                                    <textarea name="description" rows="3" class="form-control">{{ $room->description }}</textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Image Gallery:</label>
                                                    <input type="file" multiple name="picture[]" class="form-control" /><br>
                                                    @error('picture')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div>
                                                        @if($room->room_images)
                                                        <div class="row">
                                                            @foreach($room->room_images as $image)
                                                                <div class="col-md-2">
                                                                    <img src="{{asset($image->image_path)}}" 
                                                                        style="width:160px;height:150px" class="me-4 border rounded" />
                                                                        <a href="{{ url('admin/room/delete-image/'.$image->id)}}" onclick="return confirm('Are you sure you want to delete this picture?')" class="d-block btn btn-sm btn-danger">Remove</a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @else
                                                            <h5>No image were added!</h5>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update room</button>
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