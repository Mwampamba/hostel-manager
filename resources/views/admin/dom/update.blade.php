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
                        <h3 class="m-0">Update dormitory</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dormitories</li>
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
                                            <a href="{{ route('dormitories')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/admin/dom/'.$dormitory->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Dormitory name</label>
                                                    <input type="text" name="dormitory_name" value="{{ $dormitory->name }}" class="form-control" placeholder="Enter dormitory name" />
                                                    @error('dormitory_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Description</label>
                                                    <textarea name="description" class="form-control" rows="5">{{ $dormitory->description }}</textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update dormitory</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@include('admin.includes.footer')