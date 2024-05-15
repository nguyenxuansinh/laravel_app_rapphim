

<!DOCTYPE html>
<html lang="en">

@include('Home_user.layouts.head')

<style>
     .openModalBtn .xemtrailer:hover,
    .expand-button:hover{
        color: #f3ea28;
        cursor: pointer;
    }
    
    .expand-button{
        color: white;
    }
      /*modal*/
    .xemtrailer{
        text-underline-offset: 2px ;
         text-decoration: underline;
          color: white; 
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
    .ngaychieu:hover,
    .ngaychieu{
        border: 1px solid white; color: white; border-radius: 5px;
        
    }
    .ngaychieu_active{
        border: 1px solid #f3ea28; color: #f3ea28;
        
    }
    .count{
        width: 100px;
        display: flex;
        align-items: center;
        background: #94a3b8;
        border-radius: 0.4rem;
        color: #0f172a;
        justify-content: space-between;
        padding: 10px;
        margin: 20px auto;
    }
    .count p{
        margin: 0;
    }
    .count-btn{
        text-align: center;
        width: 25%;
   
    }
    .seat-table table {
    width: 100%;
    }

    .seat-table table tr {
    display: flex;
    }
    .seat-table table td {
    align-items: center;
    display: flex;
    flex: 1;
    justify-content: center;
    }

    .user_datve{
        position: sticky;
        bottom: 0;
        left: 0;
        z-index: 5;
        width: 100%;
        border-top:1px solid white;
       
    }
    

    .user_datve_conten{
        padding: 20px 0;
        background-color:rgb(15, 23, 42);      
        display: flex;
        justify-content: space-between;
    }
    
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
    .modal_het_time1{        
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;  
    background-color: rgba(0, 0, 0, 0.8);    
    }

    .modal_het_time_content1{
        width: 40rem;
        height: 12rem;
        margin: 25% auto;
    }
    
</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->
    <?php
        $phim_ = 'phim_' . Auth::user()->id;    
    ?>
  <div style="margin-top: 130px; margin-bottom: 40px;" class="container">

    <div class="row">
        <div class="col-4">
            <img style="width: 100%" src="{{ asset('image_phims/'.session($phim_)->hinhanh) }}" alt="">
        </div>
        <div class="col-8">
            <p style="font-size: 2rem" class="text-white">{{ session($phim_)->tenphim }}</p>
            <p class="text-white"><strong class="text-white">Thể loại:</strong> {{ session($phim_)->theloai }}</p>
            <p class="text-white"><strong class="text-white">Thời lượng:</strong> {{ session($phim_)->thoiluong }}</p>
            <p class="text-white"><strong class="text-white">Đạo diễn:</strong> {{ session($phim_)->daodien }}</p>
            <p class="text-white"><strong class="text-white">Diễn viên:</strong> {{ session($phim_)->dienvienchinh }}</p>
            
           
            <p class="text-white"><strong class="text-white">Ngày công chiếu:</strong> {{ \Carbon\Carbon::parse(session($phim_)->ngayphathanh)->format('d/m/Y') }}</p>
            <div style="overflow: hidden"><strong class="text-white">Mô tả:</strong><div class="mota text-white" style="height: 100px;">{{ session($phim_)->mota }}</div></div>
            <div style="text-decoration: underline; " class="expand-button">Xem thêm</div>
            
            <div  class="openModalBtn" data-video-url="{{ asset('videos/' . session($phim_)->video) }}" data-target="#videoModal{{session($phim_)->id}}">
                <img style="width: 40px" src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                <span class="xemtrailer"> Xem Trailer</span>
                
             
              </div>
             

              <!-- The Modal -->
              <div id="videoModal{{session($phim_)->id}}" class="modal">
              
              </div>
        </div>
    </div>

    

    

   
    <div class="row" style="margin: 80px auto; justify-content: center; align-items: center; font-size: 1.8rem; color: #f3ea28;">
        HIỆN CHƯA CÓ LỊCH CHIẾU
    </div>
   



    
  

   





    
  

 

    
    
       
            
   

     

     
    
   

  

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')

 
 

  
  
</body>

</html>