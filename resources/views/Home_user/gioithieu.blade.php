<!DOCTYPE html>
<html lang="en">

@include('Home_user.layouts.head')

<style>
 .main{
  
  display: flex;
  flex-wrap: wrap;
  margin: 50px;
 }
 .main > .item{
  width: calc(calc(100% - 75%) - 20px);
  margin-right: 20px; 
  margin-bottom: 40px;
 }

    /*modal*/

    .openModalBtn{
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
.no_conten{
  font-weight: bold;
  font-size: 30px;
  color: white;
  text-align: center;
  height: 500px;
  margin-top: 50px;
}

.session_1{
  display: flex;
  flex-direction: column;
    justify-content: center;
    min-height: 500px;
    padding: 0px 80px;
    background-image: url('{{ asset('assets/img/gioithieu_3.jpg') }}');
    background-repeat: no-repeat; 
    background-size: cover;
}

.session_2{
  margin: 100px 0;
}

.session_2 .conten{
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.conten .item{
  background-color: #2b56ab;
  width: calc(100% - 69%);
  display: flex;
  flex-direction: column;
    justify-content: center;
  padding: 20px;
  min-height: 200px;
  border-radius: 10px;
}
.session_3{
  padding: 0 100px;
}
.session_3_conten{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.session_3_conten .image{
  width: calc(100% - 52%);
  height: 400px;
  
  position: relative;
  overflow: hidden;
  
}
.session_3_conten .image img{
  width: 100%;
  height: 100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  
}

.session_3_conten .image:hover .img_conten{
  /*top: 0;*/
  
  transform: translateY(0);
}
.session_3_conten .image:hover .text_2{
  opacity: 1;
}
.session_3_conten .image .img_conten{
  width: 100%;
  height: 100%;
  
    position: absolute;
   /* bottom: calc(100% - 85%);
    left: 0;*/
   
    background: linear-gradient(106deg, rgba(102, 51, 153, .8), rgba(51, 102, 204, .8) 102.69%);
   
    transition: all 0.6s ease-in-out;
    transform: translateY(85%);
}

.image .img_conten .text_2{
  opacity: 0;
  transition: .5s cubic-bezier(.17,.67,.5,1.03) .25s;
}

.session_4{
  margin-bottom: 100px;
  position: relative;
  min-height: 400px;
}
.session_main{
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: -1;
}
.session_main::before{
  bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
  background: linear-gradient(90deg, #36c 6.67%, rgba(51, 102, 204, 0) 71.15%);
    content: "";
    z-index: 1;
}
.session_main img{
  width: 100%;
  height: 100%;
  z-index: -1;
}
.session_4_content{
  position: absolute;
  top:50%;
}
.session_1_container{
  margin-top: 130px; margin-bottom: 40px; padding: 0 8rem;
}

@media (min-width : 740px) and (max-width : 1023px){
  .session_1_container{
  margin-top: 130px; margin-bottom: 40px; padding: 0;
  }
}

@media (max-width : 739px){
  .session_1_container{
  margin-top: 130px; margin-bottom: 40px; padding: 0;
  }  
  .session_1{
    padding: 0 10px;
  }

  .session_2 .conten {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
  }
  .conten .item {
    
     width: 100%;
     margin-bottom: 20px;
  }
  .session_3{
    padding: 0 20px;
  }
  .session_3 p{
    text-align: justify;
  }
  .session_3_conten {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    flex-direction: column;
    align-content: center;
}
.session_3_conten .image{
  width: 100%;
}
        
}

</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->

  <div class="container session_1_container">

    <div class="session_1">
      <div><h1 style="font-weight: bold" class="text-white text-center mb-4">STARCINEMA</h1></div>
      <div><p style="font-weight: bold" class="text-white text-center">Cùng với sự phát triển của công nghệ, rạp chiếu phim ngày nay còn mang lại những trải nghiệm điện ảnh đỉnh cao, từ hệ thống âm thanh vòm ấn tượng đến công nghệ hình ảnh tiên tiến như 3D, 4D, IMAX, Dolby Atmos, và nhiều hơn nữa. Điều này giúp tạo ra một không gian sống động, mê hoặc và đầy kịch tính, khiến khán giả cảm thấy như được hòa mình vào chính câu chuyện đang diễn ra trên màn ảnh.</p></div>
    </div>

    <div class="session_2">
      <div><h3 style="font-weight: bold" class="text-white text-center mb-4">SỨ MỆNH</h3></div>
      <div class="conten">
        <div class="item">
          <div><p style="font-weight: bold; color: yellow; font-size: 32px;" class="text-center mb-2">01</p></div>
          <div><p style="font-weight: bold" class="text-white text-center">Góp phần tăng trưởng thị phần điện ảnh, văn hóa, giải trí của người Việt Nam.</p></div>
        </div>
        <div class="item">
          <div><p style="font-weight: bold; color: yellow; font-size: 32px;" class="text-center mb-2">02</p></div>
          <div><p style="font-weight: bold" class="text-white text-center">Phát triển dịch vụ xuất sắc với mức giá tối ưu, phù hợp với thu nhập người Việt Nam.</p></div>
        </div>
        <div class="item">
          <div><p style="font-weight: bold; color: yellow; font-size: 32px;" class="text-center mb-2">03</p></div>
          <div><p style="font-weight: bold" class="text-white text-center">Mang nghệ thuật điện ảnh, văn hóa Việt Nam hội nhập quốc tế.</p></div>
        </div>
      </div>
    </div>

    <div>
      <div class="session_3">
        <h3 style="font-weight: bold" class="text-white text-center mb-4">SỞ HỮU CÔNG NGHỆ HÀNG ĐẦU</h3>
         <p  class="text-white text-center mb-4">Các phòng chiếu được trang bị các thiết bị tiên tiến như hệ thống âm thanh vòm, màn hình rộng và độ phân giải cao, tạo nên hình ảnh sắc nét và âm thanh sống động.</p>
      </div>
      <div class="session_3_conten">

        <div class="image mt-5">
          <img src="{{ asset('assets/img/2d.jpg') }}" alt="">
          <div class="img_conten">
            <p style=" padding: 15px;font-weight: bold; font-size: 20px;" class=" text-white text-center mb-2">CÔNG NGHỆ 2D</p>
            <p style="font-weight: bold; " class="text-white text-center text_2">Công nghệ chiếu phim 2D Digital kỹ thuật số mang tới hình ảnh rõ nét cho khán giả yêu điện ảnh.</p>
          </div>
        </div>
        <div class="image mt-5">
          <img src="{{ asset('assets/img/Cong_nghe_3d.png') }}" alt="">
          <div class="img_conten">
            <p style=" padding: 15px;font-weight: bold; font-size: 20px;" class=" text-white text-center mb-2">CÔNG NGHỆ 3D</p>
            <p style="font-weight: bold" class="text-white text-center text_2">Công nghệ 3D Digital (Kỹ thuật số 3 chiều) cho phép khán giả cảm nhận thêm chiều sâu của hình ảnh, giúp cho không gian điện ảnh trở nên sống động như không gian thực mà chúng ta đang sống.</p>
          </div>
        </div>
        <div class="image mt-5">
          <img src="{{ asset('assets/img/dolby.png') }}" alt="">
          <div class="img_conten">
            <p style=" padding: 15px;font-weight: bold; font-size: 20px;" class=" text-white text-center mb-2">DOLBY ATMOS</p>
            <p style="font-weight: bold" class="text-white text-center text_2">Dolby Atmos – công nghệ âm thanh vòm với kỹ thuật thiết kế âm thanh phân lớp. Với hệ thống loa ở trên đầu và xung quanh, Dolby Atmos mang đến trải nghiệm trung thực và tự nhiên như thật.</p>
          </div>
        </div>
        <div class="image mt-5">
          <img src="{{ asset('assets/img/May_chieu.png') }}" alt="">
          <div class="img_conten">
            <p style=" padding: 15px;font-weight: bold; font-size: 20px;" class=" text-white text-center mb-2">MÁY CHIẾU CHRISTIE</p>
            <p style="font-weight: bold" class="text-white text-center text_2">Máy chiếu Christie là giải pháp hình ảnh cao cấp cho nhu cầu giải trí, với độ phân giải 1080P - 4K và hệ thống thấu kính đặc biệt, mang đến cho khán giả những trải nghiệm hình ảnh chân thật hơn.</p>
          </div>
        </div>
        
      </div>
    </div>

    <div><h3 style="margin: 60px 0;font-weight: bold" class="text-white text-center">TRỤ SỞ CỦA CHÚNG TÔI</h3></div>
    <div class="session_4">
        <div class="session_main">
          <img src="{{ asset('assets/img/tru_so.png') }}" alt="">
        </div>
        <div class="session_4_content">
          <div style="padding: 0 60px">
            <h3 style="color: #f3ea28">StarCinema</h3>
               
            <span class="text-white">Vị trí: 25 Hai Bà Trưng,Vĩnh Ninh, Thành Phố Huế</span><br>
            <span class="text-white">SĐT: 0935249613</span><br>
            <span class="text-white">Email: 20T1020089@husc.edu.vn</span><br>
          </div>
        </div>
      
        
        
    </div>



  </div>
  

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')
</body>

</html>