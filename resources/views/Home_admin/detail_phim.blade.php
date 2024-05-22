<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('assets2')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
            /*modal*/
    .xemtrailer{
        text-underline-offset: 2px ;
         text-decoration: underline;
          color: black; 
          font-weight: bold; 
          font-size: 20px;
    }
      .openModalBtn{
        margin-top: 20px;
      cursor: pointer;
    }
    .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8);
    
    }

    /* Modal Content/Box */


    .modal-content {
        background-color:  rgba(0, 0, 0, 0.8);
        margin: 5% auto;
        padding: 5px;
        
        width: 80%;
        max-width: 800px;
    }

    /* Close Button */
    .close {
        color: #aaa;
        display: flex;
        justify-content: flex-end;
        font-size: 28px;
        font-weight: bold;
    }
    .close span{
    width: 40px;
    height: 40px;
    text-align: center
    }

    .close span:hover,
    .close span:focus{
    color: white;
    background-color: red;
    }
    .close:hover,
    .close:focus {
        color: white;
        text-decoration: none;
        cursor: pointer;
    }

    /* Video */
    #videoPlayer {
        width: 100%;
        height: auto;
    }
        /*end_modal*/
    </style>
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
                            <a class="nav-link" href="{{ route('phim.index') }}">
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
                        <h1 class="mt-4">Phims</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Phims</li>
                        </ol>
                        <div class="row">
                            <div class="col-4">
                                <img style="width: 100%" src="{{ asset('image_phims/'.$phims->hinhanh) }}" alt="">
                            </div>
                            <div class="col-8">
                                <p style="font-size: 2rem" class="text-black">{{ $phims->tenphim }}</p>
                                <p class="text-black"><strong class="text-black">Thể loại:</strong> {{ $phims->theloai }}</p>
                                <p class="text-black"><strong class="text-black">Thời lượng:</strong> {{ $phims->thoiluong }}</p>
                                <p class="text-black"><strong class="text-black">Đạo diễn:</strong> {{ $phims->daodien }}</p>
                                <p class="text-black"><strong class="text-black">Diễn viên:</strong> {{ $phims->dienvienchinh }}</p>
                                
                               
                                <p class="text-black"><strong class="text-black">Ngày công chiếu:</strong> {{ \Carbon\Carbon::parse($phims->ngayphathanh)->format('d/m/Y') }}</p>
                                <div style="overflow: hidden"><strong class="text-black">Mô tả:</strong><div class="mota text-black" style="height: 100px;">{{ $phims->mota }}</div></div>
                                <div style="text-decoration: underline; " class="expand-button">Xem thêm</div>
                                
                                <div  class="openModalBtn" data-video-url="{{ asset('videos/' . $phims->video) }}" data-target="#videoModal{{$phims->id}}">
                                    <img style="width: 40px" src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                                    <span class="xemtrailer"> Xem Trailer</span>
                                    
                                 
                                  </div>
                                 
                    
                                  <!-- The Modal -->
                                  <div id="videoModal{{$phims->id}}" class="modal">
                                  
                                  </div>
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
        <script>
            var xemthem = document.querySelector('.expand-button');
        
        xemthem.addEventListener('click',function(){
            if(xemthem.textContent == "Xem thêm"){
                var mota = document.querySelector('.mota');
                mota.style.height = 'auto';
                xemthem.innerHTML = 'Thu gọn';
            }else{
                var mota = document.querySelector('.mota');
                mota.style.height = '100px';
                xemthem.innerHTML = 'Xem thêm';
            }
            
        });
          </script>
          <script src="{{asset('assets1')}}/js/modal.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets2')}}/js/datatables-simple-demo.js"></script>
    </body>
</html>
