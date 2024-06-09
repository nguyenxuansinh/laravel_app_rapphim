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
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
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

                            
                            
                            <div class="sb-sidenav-menu-heading">Addons</div>
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
                            <a class="nav-link" href="{{ route('phim.index') }}">
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit-Suất chiếu</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit-Suất chiếu</li>
                        </ol>
                        <div class="container-fluid">
                   
                            <form  method="POST" action="{{route('suatchieu.update',['id'=>$suatchieus->id])}}">
                                @csrf
                                   
                                 
                                    <div class="mb-3">
                                      <label for="suat_phim" class="form-label">Chọn phim chiếu</label>
                                      <select class="form-select" id="suat_phim" name="suat_phim" required>
                                        <option value="0" disabled selected>Chọn phim chiếu</option>
                                        @foreach($phims as $item)
                                        
                                        @if ($item->id==$suatchieus->id_phim)
                                        <option value="{{$item->id}}" selected>{{$item->tenphim}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->tenphim}}</option>
                                        @endif

                                        @endforeach
                                        <!-- Thêm các danh mục khác nếu cần -->
                                      </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Thời gian chiếu</label>
                                        <input type="datetime-local" class="form-control" name="thoigianchieu" value="{{ $suatchieus->thoigianchieu}}" placeholder="Nhập thời gian chiếu" required>
                                      </div>

                                    <div class="mb-3">
                                        <label for="suat_phongchieu" class="form-label">Chọn phòng chiếu</label>
                                        <select class="form-select" id="suat_phongchieu" name="suat_phongchieu" required>
                                        <option value="0" disabled selected>Chọn phòng chiếu</option>
                                        @foreach($phongchieus as $item)
                                        
                                        @if ($item->id==$suatchieus->id_phongchieu)
                                        <option value="{{$item->id}}" selected>{{$item->tenphong}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->tenphong}}</option>
                                        @endif

                                        @endforeach
                                        <!-- Thêm các danh mục khác nếu cần -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Thời gian kết thúc</label>
                                        <input type="datetime-local" class="form-control" name="thoigianketthuc" value="{{ $suatchieus->thoigianketthuc}}" placeholder="Nhập thời gian kết thúc" required>
                                      </div>

                                      <div class="mb-3">
                                        <label class="form-label">Giá vé</label>
                                        <input type="number" class="form-control" name="giave" value="{{ $suatchieus->giave}}" placeholder="Nhập giá vé" required>
                                      </div>

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                    
                        
                                <button type="submit" class="btn btn-primary">Cập nhật suất chiếu</button>
                              </form>
                        </div>
                        
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/js/datatables-simple-demo.js"></script>
    </body>
</html>
