<!DOCTYPE html>
<html lang="en">

@include('Home_user.layouts.head')

<style>
  #hero .carousel-item::before {
    content: "";
    background-color: transparent;
  }
  .button_xemthem{
    margin-top: 50px;
    display: flex;
      justify-content: center;
      align-items: center;     
  }
  .hover-button {
      padding: 10px 20px;
      font-size: 16px;
     
      color: #F3EA28;
      border: 1px solid #F3EA28;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      text-decoration: none;
    }
    a:hover{
      text-decoration: none;
    }

    .hover-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 0%;
      height: 100%;
      background: linear-gradient(to right, orange, yellow);
      color: white;
      transition: width 0.5s ease;
      z-index: -1;
    }

    .hover-button:hover::before {
      width: 100%;
      color: black;
    }
    .hover-button:hover{
      z-index: 1;
      color: white;
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
    flex-direction: column;
    align-items: center;
    justify-content: center;
    
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
   

   .bg-register-image{
      width: 30rem;
      height: 30rem;
      background: url('{{asset('assets1')}}/img/lienhe-removebg.png');
      background-position: center;
      background-size: cover;
   }

form.user .form-control-user {
    font-size: .8rem;
    border-radius: 5px;
    padding: 1.5rem 1rem;
}

form.user .btn-user {
    font-size: .8rem;
    border-radius: 5px;
    padding: .75rem 1rem;
}
.hover-button{
  text-align: center;
    width: 14rem;
}
.carousel-item1 {
    position: relative;
    width: 100%;
    height: 100vh; 
}

.carousel-image {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

.destop{
  display: block;
}
.tabled{
  display: none;
}
.mobile{
  display: none;
}

@media (min-width : 740px) and (max-width : 1023px){
  #hero{
    height: 500px;
  }
  .carousel-item1 {
    position: relative;
    width: 100%;
    height: 500px;
  }

  .destop{
  display: none;
  }
  .tabled{
    display: block;
  }
  .mobile{
    display: none;
  }
 
}

@media (max-width : 739px){
  #hero{
    height: 300px;
  }
  .carousel-item1 {
    position: relative;
    width: 100%;
    height: 300px;
  }
  
  .destop{
  display: none;
  }
  .tabled{
    display: none;
  }
  .mobile{
    display: block;
  }
  
}

</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->

  <!-- ======= start slider ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        @foreach ($banners as $key => $banner)
        <div class="carousel-item carousel-item1 {{ $key == 0 ? 'active' : '' }}">
            <img class="carousel-image" src="{{ asset('image_banner/' . $banner->anh_banner) }}" alt="Banner Image">
        </div>
      @endforeach


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section>
  <!-- End slider -->


  <!--start dang chieu-->
  <section id="main">
     
    @if(count($phimdangchieu)>0)
    <div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
      <h2 style="font-weight: bold; color: white;" class="animate__animated animate__fadeInDown">PHIM ĐANG CHIẾU</h2>
    </div>
  
    <div id="carouselExampleControlsdestop"  class="carousel slide  destop" data-bs-ride="carousel">
      <div  class="carousel-inner" role="listbox">
        @for ($i = 0; $i < count($phimdangchieu); $i += 4)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
          <div style="width: 100% ;margin: 0 10% " class="row">
            @for ($j = $i; $j < min($i + 4, count($phimdangchieu)); $j++)
            <div style="width: 20%">
                <div class="row">
                  <a href="">
                    <img src="{{ asset('image_phims/'.$phimdangchieu[$j]->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: auto;" alt="...">
                  </a>
                  
                </div>
                <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
                  
                  <h7 style=" display: -webkit-box;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $phimdangchieu[$j]->tenphim }}</h7>
                </div>
                
                <div style="display: flex; align-items: center" class="row ">
                  <div class="col">
                    <div class="openModalBtn" data-video-url="{{ asset('videos/' . $phimdangchieu[$j]->video) }}" data-target="#videoModal{{$j}}">
                      <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                      <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;"> Xem Trailer</span>
                      
                  
                    </div>
                  

                    <!-- The Modal -->
                    <div id="videoModal{{$j}}" class="modal">
                    
                    </div>
                    
                  </div>
                  <div style="flex: 1;" class="col-auto">
                    <form action="{{ route('datve.index')}}" method="post">
                      @csrf
                      <input type="hidden" name="phimchon" value="{{ $phimdangchieu[$j]->id }}">
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;"> <span>Đặt vé</span> </button>
                    </form>
                  
                  
                  </div>
                </div>
              
              
            </div>
            @endfor
          </div>
        </div>
         @endfor
      </div>
      
      
      <button style="width: 10%;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsdestop" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button style="width: 10%;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsdestop" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  
      <div class="button_xemthem">
        <a href="{{ route('phimdangchieu.detail') }}" class="hover-button">XEM THÊM</a>
      </div>
    </div>
    <div id="carouselExampleControlstabled" class="carousel slide tabled" data-bs-ride="carousel">
      <div  class="carousel-inner" role="listbox">
        @for ($i = 0; $i < count($phimdangchieu); $i += 3)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
          <div style="width: 100% ;display: flex; justify-content: center; align-items: center" class="">
            @for ($j = $i; $j < min($i + 3, count($phimdangchieu)); $j++)
            <div style="width: 33.33% ; padding: 0 10px">
                <div class="">
                  <a href="">
                    <img src="{{ asset('image_phims/'.$phimdangchieu[$j]->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: auto;" alt="...">
                  </a>
                  
                </div>
                <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
                  
                  <h7 style=" display: -webkit-box;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $phimdangchieu[$j]->tenphim }}</h7>
                </div>
                
                <div style="display: flex; align-items: center" class="row ">
                  <div class="col">
                    <div class="openModalBtn" data-video-url="{{ asset('videos/' . $phimdangchieu[$j]->video) }}" data-target="#videoModal{{$j}}">
                      <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                      <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;"> Xem Trailer</span>
                      
                  
                    </div>
                  

                    <!-- The Modal -->
                    <div id="videoModal{{$j}}" class="modal">
                    
                    </div>
                    
                  </div>
                  <div  class="col-auto">
                    <form action="{{ route('datve.index')}}" method="post">
                      @csrf
                      <input type="hidden" name="phimchon" value="{{ $phimdangchieu[$j]->id }}">
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;"> <span>Đặt vé</span> </button>
                    </form>
                  
                  
                  </div>
                </div>
              
              
            </div>
            @endfor
          </div>
        </div>
         @endfor
      </div>
      
      
      <button style="width: 10%;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlstabled" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button style="width: 10%;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlstabled" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  
      <div class="button_xemthem">
        <a href="{{ route('phimdangchieu.detail') }}" class="hover-button">XEM THÊM</a>
      </div>
    </div> 
    <div id="carouselExampleControlsmobile" class="carousel slide mobile" data-bs-ride="carousel" data-interval="false" >
      <div  class="carousel-inner" role="listbox">
        @for ($i = 0; $i < count($phimdangchieu); $i += 2)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
          <div style="width: 100% ; display: flex; justify-content: center; align-items: center" class="">
            @for ($j = $i; $j < min($i + 2, count($phimdangchieu)); $j++)
            <div style="width: 50% ; padding: 0 10px">
                <div class="">
                  <a href="">
                    <img src="{{ asset('image_phims/'.$phimdangchieu[$j]->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: auto;" alt="...">
                  </a>
                  
                </div>
                <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
                  
                  <h7 style=" display: -webkit-box;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $phimdangchieu[$j]->tenphim }}</h7>
                </div>
                
                <div style="display: flex; align-items: center" class="row ">
                  <div class="col">
                    <div class="openModalBtn" data-video-url="{{ asset('videos/' . $phimdangchieu[$j]->video) }}" data-target="#videoModal{{$j}}">
                      <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                      <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;"> Trailer</span>
                      
                  
                    </div>
                  

                    <!-- The Modal -->
                    <div id="videoModal{{$j}}" class="modal">
                    
                    </div>
                    
                  </div>
                  <div style="flex: 1;" class="col-auto">
                    <form action="{{ route('datve.index')}}" method="post">
                      @csrf
                      <input type="hidden" name="phimchon" value="{{ $phimdangchieu[$j]->id }}">
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;"> <span>Đặt vé</span> </button>
                    </form>
                  
                  
                  </div>
                </div>
              
              
            </div>
            @endfor
          </div>
        </div>
         @endfor
      </div>
      
      
      <button style="width: 10%;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsmobile" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button style="width: 10%;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsmobile" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  
      <div class="button_xemthem">
        <a href="{{ route('phimdangchieu.detail') }}" class="hover-button">XEM THÊM</a>
      </div>
    </div> 
      @endif

      
      

   


  

  </section>

 
  <!-- End dang chieu -->

  <!-- start sap chieu -->
  <section id ="phimsapchieu">
      @if(count($phimsapchieu)>0)
      <div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
        <h2 style="font-weight: bold; color: white;" class="animate__animated animate__fadeInDown">PHIM SẮP CHIẾU</h2>
      </div>
    

      <div id="carouselExampleControlsscdestop" class="carousel slide  destop" data-bs-ride="carousel">
        <div  class="carousel-inner" role="listbox">
          @for ($i = 0; $i < count($phimsapchieu); $i += 4)
          <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <div style="width: 100% ;margin: 0 10% " class="row">
            @for ($j = $i; $j < min($i + 4, count($phimsapchieu)); $j++)
              <div style="width: 20%">
                <div class="row">
                  <a href="">
                    <img src="{{ asset('image_phims/'.$phimsapchieu[$j]->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: auto;" alt="...">
                  </a>
                  
                </div>
                <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
                  
                  <h7 style=" display: -webkit-box;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $phimsapchieu[$j]->tenphim }}</h7>
                </div>
                
                <div style="display: flex; align-items: center" class="row ">
                  <div class="col">
                    <div class="openModalBtn" data-video-url="{{ asset('videos/' . $phimsapchieu[$j]->video) }}" data-target="#videoModal{{$j}}">
                      <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                      <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;"> Xem Trailer</span>
                      
                   
                    </div>
                   
  
                    <!-- The Modal -->
                    <div id="videoModal{{$j}}" class="modal">
                      
                    </div>
                    
                  </div>
                  <div style="flex: 1;" class="col-auto">
                    <form action="{{ route('datve.kocosuatchieu')}}" method="post">
                      @csrf
                      <input type="hidden" name="phimchon" value="{{  $phimsapchieu[$j]->id }}">
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;font-size: 0.9rem"> <span>Tìm hiểu thêm</span> </button>
                    </form>
                  </div>
                </div>
              
              
              </div>
            @endfor
            </div>
        </div>
          @endfor
       
         
        </div>
        <button style="width: 10%;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsscdestop" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button style="width: 10%;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsscdestop" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <div class="button_xemthem">
          <a href="{{ route('phimsapchieu.detail') }}" class="hover-button">XEM THÊM</a>
        </div>
      </div>
      <div id="carouselExampleControlssctabled" class="carousel slide tabled" data-bs-ride="carousel">
        <div  class="carousel-inner" role="listbox">
          @for ($i = 0; $i < count($phimsapchieu); $i += 3)
          <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <div style="width: 100% ;display: flex; justify-content: center; align-items: center; " class="">
            @for ($j = $i; $j < min($i + 3, count($phimsapchieu)); $j++)
              <div style="width: 33.33%; padding: 0 10px">
                <div class="">
                  <a href="">
                    <img src="{{ asset('image_phims/'.$phimsapchieu[$j]->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: auto;" alt="...">
                  </a>
                  
                </div>
                <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
                  
                  <h7 style=" display: -webkit-box;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $phimsapchieu[$j]->tenphim }}</h7>
                </div>
                
                <div style="display: flex; align-items: center" class="row ">
                  <div class="col">
                    <div class="openModalBtn" data-video-url="{{ asset('videos/' . $phimsapchieu[$j]->video) }}" data-target="#videoModal{{$j}}">
                      <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                      <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;"> Xem Trailer</span>
                      
                   
                    </div>
                   
  
                    <!-- The Modal -->
                    <div id="videoModal{{$j}}" class="modal">
                      
                    </div>
                    
                  </div>
                  <div style="flex: 1;" class="col-auto">
                    <form action="{{ route('datve.kocosuatchieu')}}" method="post">
                      @csrf
                      <input type="hidden" name="phimchon" value="{{  $phimsapchieu[$j]->id }}">
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;font-size: 0.9rem"> <span>Tìm hiểu thêm</span> </button>
                    </form>
                  </div>
                </div>
              
              
              </div>
            @endfor
          </div>
        </div>
          @endfor
        
         
        </div>
        <button style="width: 10%;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlssctabled" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button style="width: 10%;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlssctabled" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <div class="button_xemthem">
          <a href="{{ route('phimsapchieu.detail') }}" class="hover-button">XEM THÊM</a>
        </div>
      </div>
      <div id="carouselExampleControlsscmobile" class="carousel slide mobile" data-bs-ride="carousel" data-interval="false">
        <div  class="carousel-inner" role="listbox">
          @for ($i = 0; $i < count($phimsapchieu); $i += 2)
          <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <div style="width: 100% ;display: flex; justify-content: center; align-items: center; " class="">
            @for ($j = $i; $j < min($i + 2, count($phimsapchieu)); $j++)
              <div style="width: 50%;padding: 0 10px">
                <div class="">
                  <a href="">
                    <img src="{{ asset('image_phims/'.$phimsapchieu[$j]->hinhanh) }}" class="d-block mx-auto lazyload"  style="max-width: 100%; height: auto;" alt="...">
                  </a>
                  
                </div>
                <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
                  
                  <h7 style=" display: -webkit-box;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $phimsapchieu[$j]->tenphim }}</h7>
                </div>
                
                <div style="display: flex; align-items: center" class="row ">
                  <div class="col">
                    <div class="openModalBtn" data-video-url="{{ asset('videos/' . $phimsapchieu[$j]->video) }}" data-target="#videoModal{{$j}}">
                      <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  class="lazyload" alt="">
                      <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;">Trailer</span>
                      
                   
                    </div>
                   
  
                    <!-- The Modal -->
                    <div id="videoModal{{$j}}" class="modal">
                      
                    </div>
                    
                  </div>
                  <div  class="col-auto">
                    <form action="{{ route('datve.kocosuatchieu')}}" method="post">
                      @csrf
                      <input type="hidden" name="phimchon" value="{{  $phimsapchieu[$j]->id }}">
                      <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;font-size: 0.9rem"> <span>Tìm hiểu thêm</span> </button>
                    </form>
                  </div>
                </div>
              
              
              </div>
            @endfor
          </div>
        </div>
          @endfor
        
         
        </div>
        <button style="width: 10%;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsscmobile" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button style="width: 10%;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsscmobile" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <div class="button_xemthem">
          <a href="{{ route('phimsapchieu.detail') }}" class="hover-button">XEM THÊM</a>
        </div>
      </div>
    @endif

        
  </section>
  <!-- end sap chieu -->

  <!-- start phan hoi -->
  <section  id ="lienhe" class="container">

    
        <div class="card-body p-0">
            <div class="row" style="display: flex; align-items: center; justify-content: center">
                <div  class="col-lg-6 d-none d-lg-block bg-register-image lazyload"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h3 class=" text-white mb-4">THÔNG TIN LIÊN HỆ</h3>
                        </div>
                        <div class="text-left mb-2">
                          <i style="color: #f3ea28;" class="fas fa-envelope mr-2"></i>
                          <span class=" text-white ">20T1020089@husc.edu.vn</span>
                        </div>
                        <div class="text-left mb-2">
                          <i style="color: #f3ea28;" class="fas fa-phone mr-2"></i>
                          <span class=" text-white mb-4">0935249613</span>
                        </div>
                        <div class="text-left">
                          <i style="color: #f3ea28;" class="fas fa-map-marker-alt mr-2 mb-5"></i>
                          <span class=" text-white mb-4">25 Hai Bà Trưng, Vĩnh Ninh, Thành Phố Huế</span>
                        </div>
                        <form class=""  method="POST" action="{{ route('user.feedback') }}">
                            @csrf
                            <div style="margin-bottom: 1rem" class="row">
                              <input type="text" class="form-control form-control-user" id="hoten"
                              placeholder="Nhập họ và tên" name="hoten" required>
                            </div>
                            <div style="margin-bottom: 1rem" class="row">
                                <input style="border-radius: none;" type="email" class="form-control form-control-user" id="email"
                                    placeholder="Nhập email" name="email" required>
                            </div>
                            <div style="margin-bottom: 1rem" class="row">
                              <textarea class="form-control" name="mota" rows="3" placeholder="Thông điệp của bạn muốn truyền tải"></textarea>
                            </div>
                            
                            <div style="margin-bottom: 1rem" class="row">
                              <button style="background-color: #f3ea28; color: black; font-weight: bold;" type="submit" class="btn btn-user btn-block">
                                GỬI NGAY
                            </button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
   

</section>


  <!--end phan hoi-->

  <!-- ======= Footer ======= -->
  
  
  @include('Home_user.layouts.footer')
</body>

</html>