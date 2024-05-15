<!DOCTYPE html>
<html lang="en">

@include('Home_user.layouts.head')

<style>
 .centered-hr {
    width: 100%;
    margin: 20px auto;
    border: none;
    background-color: white;
    height: 2px;
    }
   
    .menu-item {
        color: white;
    }
    .menu-item:hover{
        color: #F3EA28;
    }
    .active {
   
   color: #F3EA28;
   }

   .form-group{
    margin-bottom: 1rem;
   }
   .container_1{
     margin-top: 130px; margin-bottom: 40px; padding: 0 8rem;
   }
   .flex_1{
    display: flex;
    justify-content: space-between;
   }
   @media (min-width : 740px) and (max-width : 1023px){
        .container_1{
            padding: 0 ;
        }
       
    }
    @media (max-width : 739px){
        .container_1{
            padding: 0 20px ;
        } 
        .flex_1{
            display: block;
        }
        .w_100{
            width: 100%;
        }
    }
</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <div  class="container container_1">
    <div  class="flex_1 mr-5 ml-5">
        <div style=   " margin-right: 20px;background-image: linear-gradient(to right, #64359B, #4058BE);height: max-content;padding: 20px 20px;" class="user_info col-4 w_100 mb-5">
            <div><span style="font-size: 20px;" class="text-white">{{ Auth::user()->danhhieu }}</span></div>
            <div><span class="text-white">Tích điểm C'Friends</span></div>
            <div style="margin-bottom: 10px; display: flex"><div style="color: #f3ea28">{{ Auth::user()->tichdiem }}</div><span class="text-white ">/10k</span></div>
            
            
            @if(Auth::user()->tichdiem >=10000 )
            <a href="{{ route('nangcaphang') }}"><div style="border-radius:5px;max-width: max-content;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px;" class="btn btn-user btn-block">Nâng cấp hạng</div></a>
            @else
            <div style="border-radius:5px;max-width: max-content;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px; opacity: 0.4;" class="btn btn-user btn-block">Nâng cấp hạng</div>
            @endif
            
            <hr class="centered-hr">
            <div class="mb-2 "><a href="{{ route('user.info_view') }}"class="menu-item"><i style="margin-right: 10px" class="fas fa-user  "></i> Thông tin khách hàng</a></div>
            <div class="mb-2 "><a style="display: flex" href="{{ route('user.thanhvien') }}" class="menu-item "><i style="margin-right: 10px" class="fas fa-users  "></i>Thành viên StarCinema</a></div>
            <div class="mb-2 "><a href="{{ route('user.lichsu') }}" class="menu-item"><i style="margin-right: 10px" class="fas fa-history  "></i>Lịch sử mua hàng</a></div>
            
            <hr class="centered-hr">
            <div class="mb-2 "><a href="{{ route('user.logout') }} "class="menu-item"><i style="margin-right: 10px" class="fas fa-sign-out-alt  "></i>Đăng xuất</a></div>
            
        </div>
        <div style="width: 100%">
            
            <div class="p-2">
                
                    <div class="mb-3"><span style="color: white; font-weight: bold;font-size: 20px;">THÔNG TIN KHÁCH HÀNG</span></div>
                     <form class=""  method="POST" action="{{ route('user.update_info') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input style="border-radius: 5px" type="text" class="form-control form-control-user" id="hovaten"
                                    placeholder="Họ và tên" name="hovaten" value="{{ Auth::user()->hovaten }}" required>
                            </div>
                            <div class="col-sm-6">
                                <input style="border-radius: 5px" type="text" class="form-control form-control-user" id="diachi"
                                    placeholder="Địa chỉ" name="diachi" value="{{ Auth::user()->diachi }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input style="border-radius: 5px"  type="text" class="form-control form-control-user"
                                    id="sodienthoai" placeholder="Số điện thoại" name="sodienthoai" value="{{ Auth::user()->sodienthoai }}" required>
                            </div>
                            <div class="col-sm-6">
                                <input style="border-radius: 5px" type="email" class="form-control form-control-user"
                                    id="email" placeholder="Email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>
                        @if(session('successs'))
                            <div style="color: aqua" class=" pt-3 pb-3">{{ session('successs') }}</div>
                        @endif
                        <button style="border-radius: 5px;width: 200px;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px;" type="submit" class="btn btn-user btn-block">
                            LƯU THÔNG TIN
                        </button>
                    </form>
                </div>
                <div>
                    <div class="mb-3 mt-5"><span style="color: white; font-weight: bold;font-size: 20px;">ĐỔI MẬT KHẨU</span></div>
                    
                    <form class=""  method="POST" action="{{ route('user.update_pass') }}">
                        @csrf
                        
                        <div class="form-group">
                            <input style="border-radius: 5px"  type="password" class="form-control form-control-user"
                            id="old_password" placeholder="Nhập mật khẩu cũ" name="old_password" required>
                          
                        </div>
                        <div class="form-group">
                            <input style="border-radius: 5px"  type="password" class="form-control form-control-user"
                                    id="password" placeholder="Nhập mật khẩu mới" name="password" required>
                          
                        </div>
                        <div class="form-group">
                            <input style="border-radius: 5px"  type="password" class="form-control form-control-user"
                                    id="password_confirmation" placeholder="Nhập lại mật khẩu mới" name="password_confirmation" required>
                          
                        </div>

                        @if(session('error'))
                            <div style="color: red" class=" pt-3 pb-3">{{ session('error') }}</div>
                        @endif

                        @if(session('success'))
                            <div style="color: aqua" class=" pt-3 pb-3">{{ session('success') }}</div>
                        @endif

                        <button style="border-radius: 5px;width: 200px;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px;" type="submit" class="btn btn-user btn-block">
                            Đổi mật khẩu
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
     
</div>
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
  <script>
    
   
 const menuItems = document.querySelectorAll('.menu-item');

// Lặp qua từng phần tử menu và kiểm tra xem trang hiện tại có liên kết với menu đó không
menuItems.forEach(item => {
    if (window.location.href.includes(item.href)) {
        // Nếu trang hiện tại liên kết với menu đó, thêm lớp 'active'
        item.classList.add('active');
    }
});
    

  </script>
  @include('Home_user.layouts.footer')
 
</body>

</html>