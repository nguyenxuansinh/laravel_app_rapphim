<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>STARCINEMA Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('assets2')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('admin.index')}}">STARCINEMA Admin</a>
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
                                Thống kê
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
                                Phim
                            </a>
                            <a class="nav-link" href="{{route('suatchieu.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Suất chiếu
                            </a>
                            <a class="nav-link" href="{{route('feedback.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Phản hồi khách hàng
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div>
                    <div style="display: flex ;align-items: center; justify-content: center; margin:  0 60px">
                        <div style="flex :1 ; height: 30rem;"><img  style="width: 100%; height: 100%;" src="{{ asset('image_phims/'.$phim->hinhanh) }}" alt=""></div>
                        <div style=" background-color: #c293e7;flex: 1;padding: 29px;margin: 10% 15%;">
                            <div style="font-size: 28px ; font-weight: bold ; margin-bottom: 20px">TÊN PHIM :{{ $phim->tenphim }}</div>
                            <div style="font-size: 24px ;margin-bottom: 20px ">MÃ HÓA ĐƠN : {{ $hoadon[0]->id }}</div>
                            <div style="display: flex ; align-items: center; justify-content: space-between ; margin-bottom: 20px">
                                
                                <div class = "col">
                                    <div style="font-size: 18px ; ">
                                        PHÒNG CHIẾU :
                                    </div>
                                    <div style="font-size: 18px ; "> {{ $phongchieu->tenphong }}</div>
                                </div>
                               
                                <div class ="col">
                                    <div style="font-size: 18px ; ">
                                        THỜI GIAN
                                    </div>
                                    <div style="font-size: 18px ; ">
                                        @php
                                        // Kiểm tra nếu $ngaychieu là một chuỗi thì chuyển đổi thành đối tượng DateTime
                                        if (is_string($ngaychieu)) {
                                            $ngaychieu = new DateTime($ngaychieu);
                                        }
                                
                                        // Kiểm tra nếu $ngaychieu là một đối tượng DateTime trước khi sử dụng phương thức format()
                                        if ($ngaychieu instanceof DateTime) {
                                            $gio = $ngaychieu->format('H');
                                            $phut = $ngaychieu->format('i');
                                            $ngay = $ngaychieu->format('d');
                                            $thang = $ngaychieu->format('m');
                                            $nam = $ngaychieu->format('Y');
                                        } else {
                                            // Xử lý nếu $ngaychieu không phải là đối tượng DateTime
                                            $gio = $phut = $ngay = $thang = $nam = 'N/A';
                                        }
                                    @endphp
                                
                                    {{ $gio }}:{{ $phut }},  {{ $ngay }}/  {{ $thang }} / {{ $nam }}
                                    </div>
                                </div>
                               
                            </div>
                            <div style="display: flex ; align-items: center;justify-content: space-between;margin-bottom: 20px">
                                
                                <div class="col">
                                    <div style="font-size: 18px ; ">
                                        SỐ LƯỢNG VÉ :
                                    </div>
                                    <div>
                                        {{ $hoadon[0]->soluongvedamua }}
                                    </div>
                                </div>
                                
                                <div class ="col">
                                    <div style="font-size: 18px ; ">

                                        GHẾ ĐÃ CHỌN :
                                    </div>
                                    <div style="font-size: 18px ; ">

                                        <?php
                                        $html = '';
                                      
                                        foreach($ghes as $ghe) {
                                            $tenGhe = $ghe['ten_ghe'];
                                            $html .= $tenGhe . ', ';
                                        }
    
                                        // Loại bỏ dấu phẩy cuối cùng nếu có
                                        $html = rtrim($html, ', ');
                                         ?>
                                       {{ $html}}
                                    </div>
                                </div>
                               
                                
                            </div>
                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">TRỞ LẠI</a>
                        </div>
                        
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/demo/chart-area-demo.js"></script>
        <script src="{{asset('assets2')}}/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/js/datatables-simple-demo.js"></script>
    </body>
</html>
