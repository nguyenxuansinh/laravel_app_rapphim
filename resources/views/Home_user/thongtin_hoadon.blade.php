<!DOCTYPE html>
<html lang="en">

@include('Home_user.layouts.head')

<style>
 
 .modal_het_time{        
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;  
    background-color: rgba(0, 0, 0, 0.8);    
    }

    .modal_het_time_content{
        width: 40rem;
        height: 12rem;
        margin: 25% auto;
    }

    @media (min-width : 740px) and (max-width : 1023px){
      .col-6{
        width: 100%;
      }
        
    }

    @media (max-width : 739px){
      .col-6{
        width: 100%;
      }

    }

</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->
  <?php 
     $mahoadon_ = 'mahoadon_' . Auth::user()->id;
     $phim_ = 'phim_' . Auth::user()->id; 
   
    $phongchieu_ = 'phongchieu_' . Auth::user()->id;
    $chon_ngay_ = 'chon_ngay_' . Auth::user()->id;
    $chongio_ = 'chongio_' . Auth::user()->id;
    $so_luong_ = 'so_luong_' . Auth::user()->id;
    $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
  ?>
  <!-- ======= Hero Section ======= -->
  <div id="" style="margin-top: 60px; margin-bottom: 40px;" class="container">
    <div style="display: flex;align-items: center;justify-content: center;">
       
        <div class="col-6" style="background-color: #3366CC; border-radius: 10px;padding: 20px;">
            <div>
               
                 <div style="display: flex; justify-content: space-between">
                    <div style="height: 20rem" class="col"> <img src="{{ asset('image_phims/'.session($phim_)->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: 100%;" alt="..."></div>
                    <canvas id="qrcode"class="col" style=""></canvas>

                    <script>
                         var mahoadon = "{{ session($mahoadon_) }}"; // Lấy giá trị từ session PHP

                        var qr = new QRious({
                            element: document.getElementById('qrcode'),
                            value: mahoadon,
                            
                        });
                    </script>
                 </div>
                <div style=" font-size: 20px; font-weight: bold; margin-bottom: 20px" class = "  text-white">   {{ session($phim_)->tenphim }}</div>                 
                  
               

               <div style=" font-size: 20px; font-weight: bold" class = "text-white">StarCinema</div>
               <div style="margin-bottom: 20px;" class = "text-white">25 Hai Bà Trưng,Vĩnh Ninh, Thành Phố Huế , Thừa Thiên Huế</div>

               <div style="margin-bottom: 20px;" class="row">
                  <div class="col">
                    <div style="color: #F3EA28">Phòng chiếu</div>
                    <div class="text-white">  @foreach (session($phongchieu_) as $rows)
                              {{ $rows['tenphongchieu'] }}
                           @endforeach
                    </div>
                  </div>
                  <div class="col">
                    <div style="color: #F3EA28">Thời gian</div>
                    <div class="text-white"> 
                      <?php

                       

                    
                        $formattedDateTime = \Carbon\Carbon::parse(session($chon_ngay_))->isoFormat('DD/MM/YYYY ');

                       

                        $dayOfWeek = \Carbon\Carbon::parse(session($chon_ngay_))->isoFormat('dddd');

                        ?>
                     
                      @foreach (session($chongio_) as $row)
                           {{ $row['giochieu'] }}
                      @endforeach
                      , {{ $dayOfWeek }}
                      , {{ $formattedDateTime }} 
                    </div>
                  </div>
               </div>

                <div style="margin-bottom: 20px;" class="row">
                  <div class="col">
                    <div style="color: #F3EA28">Số lượng vé</div>
                    <div class="text-white">{{ session($so_luong_) }}</div>
                  </div>
                  <div class="col">
                    <div style="color: #F3EA28">Ghế đã chọn</div>
                    <div class="text-white"> 
                      @php
                          $ds_ghe = session($ds_ghe_);
                          usort($ds_ghe, function($a, $b) {
                              return strcmp($a['tenghe'], $b['tenghe']);
                          });
                          $tenGhe = implode(', ', array_column($ds_ghe, 'tenghe'));
                      @endphp

                      {{ $tenGhe }}
                    </div>
                  </div>
                </div>

               
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

            <form class=""  method="POST" action="{{ route('guithongtindat_ve_email') }}">
              @csrf
                <input type="hidden" name="guimahoadon" value="{{ session($mahoadon_) }}">
              <div class="">
                <button style="background-color: #f3ea28; color: black; font-weight: bold;width: 100%;" type="submit" class="btn btn-user btn-block">
                  GỬI LẠI EMAIL
              </button>
              </div>
          </form>
           
        </div>

        
      
    </div>
     
</div>
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')
</body>

</html>