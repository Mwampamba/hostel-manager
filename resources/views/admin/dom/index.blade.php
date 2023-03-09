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
                            <h3 class="m-0">Dormitories</h3>
                        </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
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
                                            <a href="{{ route('addDormitory')}}" class="btn btn-success float-right"><i class="fa fa-add"></i> Add dormitory</a> 
                                        </div>
                                            <div class="table-responsive">  
                                                <table id="myDataTable" class="table table-bordered">
                                                    <thead>
                                                        <tr> 
                                                            <th>#</th>
                                                            <th>Dormitory name</th>
                                                            <th>Description</th>                                     
                                                            <th>Action</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($dormitories as $index=>$dormitory)
                                                            <tr>
                                                                <td>{{$index+1}}</td>
                                                                <td>{{$dormitory->name}}</td>
                                                                <td>{{$dormitory->description}}</td>
                                                                <td><a href="/admin/dom/{{$dormitory->id}}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a></td>
                                                                <td><a href="/admin/dom/delete-dom/{{$dormitory->id}}" onclick="return confirm('Are you sure you want to delete this dormitory?')" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
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