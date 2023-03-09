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
                                <h3 class="m-0">Students</h3>
                            </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active">Students</li>
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
                                                <a href="#" class="btn btn-success float-right"><i class="fa fa-add"></i> Add new student</a> 
                                            </div>
                                                <div class="table-responsive">  
                                                    <table id="myDataTable" class="table table-bordered">
                                                        <thead>
                                                            <tr> 
                                                                <th>#</th>
                                                                <th>Full name</th>
                                                                <th>Programme</th>
                                                                <th>Class</th>  
                                                                <th>Collage</th>                                    
                                                                <th>Action</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($students as $index=>$student)
                                                                <tr>
                                                                    <td>{{ $index+1 }}</td>
                                                                    <td>{{ $student->name }}</td>
                                                                    <td>{{ $student->programme }}</td>
                                                                    <td>{{ $student->class }}</td>
                                                                    <td>{{ $student->collage }}</td>

                                                                    <td><a href="/admin/student/{{$student->id}}" class="btn btn-secondary"><i class="fa fa-eye"></i> Details</a></td>
                                                                    <td><a href="/admin/student/delete-student/{{$student->id}}" onclick="return confirm('Are you sure you want to delete this student?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
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