    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Dashboard - SB Admin</title>
            <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
            <link href="{{asset('assets2')}}/css/styles.css" rel="stylesheet" />
            <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        </head>
        <body class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="{{route('admin.index')}}">Start Bootstrap</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            
                            <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="{{route('admin.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                
                
                                <!--</div>-->
                                <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="{{route('thongtinkhachhang.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Thông tin khách hàng
                                </a>
                                <a class="nav-link" href="{{route('banner.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Banner
                                </a>
                                <a class="nav-link" href="{{route('phongchieu.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Phòng chiếu
                                </a>
                                <a class="nav-link" href="{{route('ghe.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Ghế
                                </a>
                                <a class="nav-link" href="{{route('phim.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Phims
                                </a>
                                <a class="nav-link" href="{{route('suatchieu.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Suất chiếu
                                </a>
                                <a class="nav-link" href="{{route('feedback.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Feedbacks
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            Start Bootstrap
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-area me-1"></i>
                                            Bar Chart 
                                        </div>
                                        <div class="card-body"><canvas id="myChartDoanhThu" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                                
                                    
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Line Chart
                                        </div>
                                        <div class="card-body"><canvas id="myLineChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div >
                                
                                        <canvas id="myPieChart" width="400" height="400"></canvas>
                                
                            </div>

                            <div style="margin: 20px 0 ; display: flex ; align-items:  center; justify-content: space-between">
                                <form action="{{ route('doanh-thu') }}" method="GET">
                                <label for="start_date">Ngày bắt đầu:</label>
                                <input type="date" id="start_date" name="start_date" style="margin-right: 20px">
                            
                                <label for="end_date">Ngày kết thúc:</label>
                                <input type="date" id="end_date" name="end_date">
                            
                                <button type="submit">Tính doanh thu</button>
                                </form>

                                <div style="font-size: 24px;">Tổng tiền: {{ number_format($tongDoanhThu, 0, ',', '.') }} VNĐ</div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    DataTable 
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr >
                                                <th>Mã hóa đơn</th>
                                                <th>Ngày thanh toán</th>
                                                <th>Tổng tiền</th>
                                                <th>Phương thức thanh toán</th>
                                                <th>Tích điểm</th>
                                                <th></th>
                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã hóa đơn</th>
                                                <th>Ngày thanh toán</th>
                                                <th>Tổng tiền</th>
                                                <th>Phương thức thanh toán</th>
                                                <th>Tích điểm</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            @foreach ($hoadons as $item)
                                
                                                <tr >
                                                    
                                                    <td>{{$item->id}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->ngaythanhtoan)->format('d/m/Y') }}</td>
                                                    <td>{{ number_format($item->tongtien, 0, ',', '.') }} VNĐ</td>
                                                    <td>{{$item->phuongthucthanhtoan}}</td>
                                                    <td>{{$item->soluongvedamua*90}} điểm</td>
                                                
                                                    <td><a href="{{route('hoadon.detail',['id' => $item->id])}}"  style="color: white; font-size: 0.8rem; cursor: pointer;" class="btn btn-info">Xem chi tiết</a></td>
                                                </tr>
                                            @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('assets2')}}/js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('assets2')}}/js/datatables-simple-demo.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script>
                                        // Lấy dữ liệu từ biến PHP được truyền vào từ controller
                                        var labels = [];
                                        var data = [];
                                        console.log(<?php echo json_encode($doanhThuTheoThang); ?>);
                                        @foreach ($doanhThuTheoThang as $item)
                                            labels.push('Tháng {{ $item->thang }} năm {{ $item->nam }}');
                                            data.push({{ $item->tongDoanhThu }});
                                        @endforeach

                                        // Lấy thẻ canvas và vẽ biểu đồ bằng Chart.js
                                        var ctx = document.getElementById('myChartDoanhThu').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Doanh thu theo tháng',
                                                    data: data,
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });

                                        var data = <?php echo json_encode($doanhThuTheoNam); ?>;

                                        // Tách labels và values từ dữ liệu
                                        var labels = data.map(item => item.nam);
                                        var values = data.map(item => item.tongDoanhThu);

                                        // Lấy context của canvas
                                        var cty = document.getElementById('myLineChart').getContext('2d');

                                        // Vẽ biểu đồ
                                        var myLineChart = new Chart(cty, {
                                            type: 'line',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Doanh thu theo năm',
                                                    data: values,
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    borderWidth: 1,
                                                    pointRadius: 5, // Kích thước của điểm chấm
                                                    pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Màu nền của điểm chấm
                                                    pointBorderColor: 'rgba(75, 192, 192, 1)', // Màu viền của điểm chấm
                                                    pointHoverRadius: 10 // Kích thước của điểm chấm khi di chuột vào
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });


                                        
                                        console.log('<?php echo json_encode($results); ?>');
                                    var data2 =<?php echo json_encode($results); ?>;
                                    var label1s = [];
                                    var value1s = [];
                                    data2.forEach(item => {
                                        label1s.push(item.tenphim);
                                        value1s.push(item.tong_doanh_thu); // Thay đổi từ "tongDoanhThu" thành "tong_doanh_thu"
                                    });

                                    // Vẽ biểu đồ tròn bằng Chart.js
                                    var ctx1 = document.getElementById('myPieChart').getContext('2d');
                                    var myPieChart = new Chart(ctx1, {
                                        type: 'pie',
                                        data: {
                                            labels: label1s,
                                            datasets: [{
                                                data: value1s, // Thay đổi từ "values" thành "value1s"
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.5)',
                                                    'rgba(54, 162, 235, 0.5)',
                                                    'rgba(255, 206, 86, 0.5)',
                                                    'rgba(75, 192, 192, 0.5)',
                                                    'rgba(153, 102, 255, 0.5)',
                                                    'rgba(255, 159, 64, 0.5)'
                                                ]
                                            }]
                                        },
                                        options: {
                                            responsive: false,
                                            maintainAspectRatio: false
                                        }
                                    });
                                    </script>

                                    
                               
        </body>
    </html>
