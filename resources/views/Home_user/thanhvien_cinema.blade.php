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
    <div class=" mr-5 ml-5 flex_1">
        <div style=" margin-right: 20px;background-image: linear-gradient(to right, #64359B, #4058BE);height: max-content;padding: 20px 20px;" class="user_info col-4 menu_2 w_100 mb-5">
            <div><span style="font-size: 20px;" class="text-white">{{ Auth::user()->danhhieu }}</span></div>
            <div><span class="text-white">Tích điểm C'Friends</span></div>
            <div style="margin-bottom: 10px; display: flex"><div style="color: #f3ea28">{{ Auth::user()->tichdiem }}</div><span class="text-white ">/10k</span></div>
            
            
            @if(Auth::user()->tichdiem >=10000 )
            <a href="{{ route('nangcaphang') }}"><span style="border-radius:5px;max-width: max-content;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px;" class="btn btn-user btn-block">Nâng cấp hạng</span></a>
            @else
            <span style="border-radius:5px;max-width: max-content;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px; opacity: 0.4;" class="btn btn-user btn-block">Nâng cấp hạng</span>
            @endif
            
            <hr class="centered-hr">
            <div class="mb-2 "><a href="{{ route('user.info_view') }}"class="menu-item "><i style="margin-right: 10px" class="fas fa-user mr-2 "></i> Thông tin khách hàng</a></div>
            <div class="mb-2 "><a style="display: flex" href="{{ route('user.thanhvien') }}" class="menu-item "><i style="margin-right: 10px" class="fas fa-users mr-2 "></i>Thành viên StarCinema</a></div>
            <div class="mb-2 "><a href="{{ route('user.lichsu') }}" class="menu-item"><i style="margin-right: 10px" class="fas fa-history mr-2 "></i>Lịch sử mua hàng</a></div>
            
            <hr class="centered-hr">
            <div class="mb-2 "><a href="{{ route('user.logout') }} "class="menu-item"><i  style="margin-right: 10px" class="fas fa-sign-out-alt mr-2 "></i>Đăng xuất</a></div>
            
        </div>
        <div style="width: 100%">
            
            <div class="p-2">
                
                    <div style="display: flex;  justify-content: space-between;width: 100%;">
                        <div style="flex: 1; margin-right: 10px;">
                            <div style="height: 150px"> <img style="width: 100%; height: 100%;"  src="{{ asset('assets/img/img-card-member2.jpg') }}" alt=""></div>
                            <div style="color: white; font-size: 24px; font-weight: bold; margin: 10px 0">C'Friends</div>
                            <div class="text-white">Được cấp lần đầu khi mua 2 vé xem phim bất kỳ tại Cinestar.</div>
                            <div style="color: white; font-size: 1rem; font-weight: bold;margin: 10px 0">ĐƯỢC TÍCH LŨY ĐIỂM THEO GIÁ TRỊ MUA HÀNG HÓA DỊCH VỤ NHƯ SAU:</div>
                            <ul>
                                <li class="text-white">Được giảm 10% trực tiếp trên giá trị hóa đơn bắp nước khi mua tại quầy.</li>
                                <li class="text-white">Được tham gia các chương trình dành cho thành viên.</li>
                            </ul>
                            
                        </div>
                        <div style="flex: 1; margin-left: 10px;">
                            <div style="height: 150px"><img style="width: 100%; height: 100%;" src="{{ asset('assets/img/img-card-vip.jpg') }}" alt=""></div>
                            <div style="color: white; font-size: 24px; font-weight: bold ;margin: 10px 0">VIP</div>
                            <div class="text-white">Được cấp cho thành viên C’Friends khi tích lũy được ít nhất 10,000 điểm.</div>
                            <div style="color: white; font-size: 1rem; font-weight: bold;margin: 10px 0">ĐƯỢC TÍCH LŨY ĐIỂM THEO GIÁ TRỊ MUA HÀNG HÓA DỊCH VỤ NHƯ SAU:</div>
                            <ul>
                                <li class="text-white">Được giảm 15% trực tiếp trên giá trị hóa đơn bắp nước khi mua tại quầy.</li>
                                <li class="text-white">Có cơ hội nhận vé tham gia Lễ Ra Mắt Phim và các chương trình khuyến mãi khác của Cinestar.</li>
                            </ul>
                            
                        </div>
                    </div>
                
                
            </div>
        </div>
    </div>
     
</div>
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')
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
</body>

</html>