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

    .width_thanhtoan{
      width: 40%;
    }

    .width_thongtin{
      width: 60%;
    }
    @media (min-width : 740px) and (max-width : 1023px){
      .modal_het_time_content {
            width: max-content;
            height: 12rem;
            margin: 25% auto;
        }
    }
    @media (max-width : 739px){
      .width_thanhtoan{
        margin-top: 20px;
      width: 100%;
    }

    .width_thongtin{
      width: 100%;
    }
    .d_flex{
      flex-direction: column-reverse;
    }
    .modal_het_time_content {
            width: max-content;
            height: 12rem;
            margin: 25% auto;
         }
    }

</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->
  <?php 
    $phim_ = 'phim_' . Auth::user()->id; 
    $chongio_ = 'chongio_' . Auth::user()->id;
    $so_luong_ = 'so_luong_' . Auth::user()->id;
    $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
    $tongTien_ = 'tongTien_' . Auth::user()->id;
    $phongchieu_ = 'phongchieu_' . Auth::user()->id;
    $chon_ngay_ = 'chon_ngay_' . Auth::user()->id;
    $expires_at_ = 'expires_at_' . Auth::user()->id;
  ?>
  <!-- ======= Hero Section ======= -->
  <div id="" style="margin-top: 130px; margin-bottom: 40px;" class="container">
    <div style="justify-content: space-between;" class="d-flex d_flex">
        <div class="width_thanhtoan" >
          <div style="padding: 10px 70px;margin-bottom: 20px; ">
            <div style="border: 1px solid;padding: 10px;background-color: #3366CC">
              <form action="{{ route('vnpay_payment')}}" method="POST">
                @csrf
                <input type="hidden" name="total_vnpay" value="{{ session($tongTien_) }}">
                <button type="submit" name = "redirect" style="background: transparent;
                color: white;
                outline: none;
                border: none;
                width: 100%;">Thanh toan VNPay</button>
              </form>
            </div>
           
          </div>

          <div style="padding: 10px 70px;margin-bottom: 20px; ">
            <div style="border: 1px solid;padding: 10px; background-color: #3366CC">
              <form action="{{ route('momo_payment')}}" method="POST">
                @csrf
                <input type="hidden" name="total_momo" value="{{ session($tongTien_) }}">
                <button type="submit" name = "payUrl" style="background: transparent;
                color: white;
                outline: none;
                border: none;
                width: 100%;">Thanh toan qua Momo</button>
              </form>
            </div>
           
          </div>

          
            
        
        </div>
        <div class="width_thongtin" style="background-color: #3366CC; border-radius: 10px; padding: 20px">
            <div>
               <div style="display: flex; justify-content: space-between;align-items: center;margin-bottom: 20px;">

                  <div style=" font-size: 20px; font-weight: bold" class = " text-center text-white">   {{ session($phim_)->tenphim }}</div>                 
                  <div style="padding: 10px;display: flex;align-items: center;border-radius: 5px; margin-right: 20px">
                    
                        
                            <div style="margin-right: 10px" class="text-center text-white">Thời gian giữ vé: </div>
    
                            @if(session()->has($expires_at_) )
                            <div style="font-weight: bold; background-color: #f3ea28;padding: 10px; border-radius: 5px" class="text-center text-black" id="sessionLifetime">
                                {{ floor((Session::get($expires_at_) - time()) / 60) }} :
                                {{ (Session::get($expires_at_) - time()) % 60 }} 
                            </div>
                            <script>
                                // Cập nhật thời gian sống mỗi giây
                                setInterval(function() {
                                    var currentTime = Math.floor(Date.now() / 1000); // Thời gian hiện tại tính theo giây
                                    var sessionExpiresAt = {{ Session::get($expires_at_) }};
                                    var sessionLifetime = Math.max(0, sessionExpiresAt - currentTime); // Đảm bảo thời gian sống không âm
                                    var minutes = Math.floor(sessionLifetime / 60);
                                    var seconds = sessionLifetime % 60;
                                    if (minutes < 10) {
                                        minutes = "0" + minutes;
                                    }
                                    if (seconds < 10) {
                                        seconds = "0" + seconds;
                                    }
                                    var message =  minutes + ' : ' + seconds ;
                                    document.getElementById('sessionLifetime').innerHTML = message;
                                    if(minutes === '00' && seconds=='00'){
                                   
                                        document.querySelector('.modal_het_time').style.display = "block";
                                        if (!window.ajaxCalled) {
                                          window.ajaxCalled = true;
                                          $.ajax({
                                                url: "{{ route('xoaluutam') }}",
                                                type: 'POST',
                                                data: {
                                                _token: "{{ csrf_token() }}",
                                                },
                                                success: function(response) {
                                                    console.log('Success:', response);
                                                                                  
                                                },
                                                error: function(xhr) {
                                                console.error('Error:', xhr.responseText);
                                                                                  // Xử lý lỗi nếu có
                                                  }
                                                });
                                          }
                                    }
                                    
                                }, 1000);
                            </script>
                            
                            @else
                            <div style="font-size: 24px; font-weight: bold" class="text-center text-black">05:00</div>
                            
                            @endif
                        
                       
                    
                  </div> 
               </div>

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

                <div style="border-top: 1px dashed white; padding: 20px 0;">
                    <div style="display: flex; align-items: center; justify-content: space-between"> 
                      <div style="color: #F3EA28; font-size: 24px">THANH TOÁN</div>
                      <div style="color: white; font-size: 24px"> {{ number_format(session($tongTien_), 0, ',', '.') }} đ</div>
                    </div>
                </div>
            </div>
           
        </div>

        <div id="het_time_giucho" class='modal_het_time'>
    
          <div class='modal_het_time_content'>
              <div style="font-size: 24px;" class="text-center text-white">LƯU Ý!</div>
              <div style="font-size: 20px;" class="text-center text-white">Hết thời gian giữ chỗ</div>
      
              <div style="margin-top: 20px">
                  <form action="{{ route('datve.index')}}" method="POST">
                      @csrf
                     
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;width: 50%;"> <span>OK</span> </button>
                    </form>
              </div>
          </div>
              
        </div>
      
    </div>
     
</div>
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')
</body>

</html>