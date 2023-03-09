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
                        <h3 class="m-0">Student details</h3>
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
                                        <h4>
                                            <a href="{{route('students')}}" class="btn btn-danger float-right">BACK</a> 
                                            <a href="{{route('students')}}" class="btn btn-secondary float-left"><i class="fas fa-download"></i> Generate PDF</a> 
                                        </h4>
                                    </div>
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                              <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Student name</th>
                                                        <th>Class</th>
                                                        <th>Progamme of study</th>
                                                        <th>Mobile phone</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->class}}</td>
                                                        <td>{{$student->programme}}</td>
                                                        <td>{{$student->phone }}</td>
                                                        
                                                    </tr>
                                                </tbody>
                                              </table>
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