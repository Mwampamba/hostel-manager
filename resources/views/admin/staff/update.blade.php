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
                        <h3 class="m-0">Update user profile</h3>
                    </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                                            <a href="{{route('users')}}" class="btn btn-danger float-right">BACK</a> 
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/admin/user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Full name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Full name" />
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Email address</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email address" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Profile picture</label>
                                                    <input type="file" name="picture" class="form-control" />
                                                    @error('picture')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Password</label>
                                                     <input type="password" name="password" class="form-control" placeholder="Write Password" />
                                                     @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Repeat Password</label>
                                                     <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password" />
                                                     @error('repeat_password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Update</button>
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