<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StarCinema</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url('{{ asset('assets/img/login_phim.jpg') }}');background-repeat: no-repeat; background-size: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div  class="col-xl-5 col-lg-12 col-md-9 ">

                <div style="background-color: rgba(156, 104, 104, 0.2);" class="card o-hidden border-0 shadow-lg my-5">
                    <div style=" border: 1px solid white;border-radius: 10px;" class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <!--<div class="row">-->
                           <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            <div  class="col">
                                <div  class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4">Forgot password!</h1>
                                        
                                    </div>
                                    <div class ="text-white">Chúng tôi sẽ gửi xác nhận đến email của bạn</div>
                                    <div style="margin-bottom: 20px" class = "text-white">Vào Email để đổi mật khẩu mới.</div>
                                    <form class="user" method="POST" action="{{route('user.for_got_check')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail"
                                                placeholder="Enter email"
                                                name="email" required>
                                        </div>

                                        <div id="notification" style="display: none;">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                               
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                
                                            </div>
                                        @endif
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var notification = document.getElementById('notification');
                                                notification.style.display = 'block'; // Hiển thị thông báo
                                        
                                                // Chờ 3 giây trước khi xóa nội dung
                                                setTimeout(function () {
                                                    // Xóa nội dung của phần tử thông báo
                                                    notification.innerHTML = '';
                                                    // Sau khi xóa nội dung, ẩn phần tử thông báo đi
                                                    notification.style.display = 'none';
                                                }, 3000); // 3 giây
                                            });
                                        </script>
                                       
                                        <button style="background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px;" type="submit" class="btn  btn-user btn-block">
                                            Xác nhận
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                       <!-- </div>-->
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets')}}/js/sb-admin-2.min.js"></script>

</body>

</html>