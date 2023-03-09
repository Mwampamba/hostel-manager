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
                                <h3 class="m-0">Users</h3>
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
                                                <a href="{{ route('addUser')}}" class="btn btn-success float-right"><i class="fa fa-add"></i> Add new user</a> 
                                            </div>
                                                <div class="table-responsive">  
                                                    <table id="myDataTable" class="table table-bordered">
                                                        <thead>
                                                            <tr> 
                                                                <th>#</th>
                                                                <th>Full name</th>
                                                                <th>Email address</th>
                                                                <th>Profile</th>  
                                                                <th>Status</th>                                    
                                                                <th>Action</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($users as $index=>$user)
                                                                <tr>
                                                                    <td>{{ $index+1 }}</td>
                                                                    <td>{{ $user->name }}</td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>
                                                                        <img src="{{ asset('uploads/users/'.$user->picture) }}" class="form-control rounded" alt="user picture" />
                                                                    </td>
                                                                    <td>{{ $user->role == '1' ? 'Admin' : 'User' }}</td>
                                                                    <td><a href="/admin/user/{{$user->id}}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a></td>
                                                                    <td><a href="/admin/user/delete-user/{{$user->id}}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
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