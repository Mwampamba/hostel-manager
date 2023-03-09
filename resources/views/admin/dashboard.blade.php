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
                                <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-house"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('bookings') }}" class="decorator-none">Bookings</a></span>
                        <span class="info-box-number">{{ $bookings }}</span>
                        
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fa-solid fa-hotel"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text"><a href="{{ route('rooms') }}" class="decorator-none">Rooms</a></span>
                                <span class="info-box-number">{{ $rooms }}</span>
                            </div>
                    </div>
                </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><a href="{{ route('students')}}" class="decorator-none">Students(Men)</a> </span>
                                <span class="info-box-number">{{App\Models\Student::where('sex', 'Male')->count()}}</span>
                            </div>
                        </div>
                    </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{ route('students')}}" class="decorator-none">Students(Women)</a> </span>
                        <span class="info-box-number">{{App\Models\Student::where('sex', 'Female')->count()}}</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <!-- DONUT CHART -->
                  <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title">General Bookings</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 417px;" width="834" height="500" class="chartjs-render-monitor"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      
                 
                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                  <!-- LINE CHART -->
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Bookings Based on Student Gender</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 417px;" width="834" height="500" class="chartjs-render-monitor"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
 
                </div>
                <!-- /.col (RIGHT) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
    </div>
@include('admin.includes.footer')