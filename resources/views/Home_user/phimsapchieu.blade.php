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
@media (min-width : 740px) and (max-width : 1023px){
  .main{
    display: flex;
    flex-wrap: wrap;
    margin: 20px;
  }
  .main > .item{
    padding: 10px;
    width: 33.33%;
    margin-right: 0; 
    margin-bottom: 20px;
  }

}
@media (max-width : 739px){
  .main{
    display: flex;
    flex-wrap: wrap;
    margin: 20px;
  }
  .main > .item{
    padding: 10px;
    width: 50%;
    margin-right: 0; 
    margin-bottom: 20px;
  }
}
</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="">
    @if(count($phimsapchieu)>0)
      <div class ="main">
        @foreach ($phimsapchieu as $item)
        <div class ="item">
            <div class="row">
              <a href="">
                <img src="{{ asset('image_phims/'.$item->hinhanh) }}" class="d-block mx-auto"  style="max-width: 100%; height: auto;" alt="...">
              </a>
              
            </div>
            <div style="text-align: center;height: 45px; margin-top: 10px; margin-bottom: 10px;">
              
              <h7 style=" display: -webkit-box;
              -webkit-box-orient: vertical;
              overflow: hidden;
              -webkit-line-clamp: 2; font-family: 'Arial', sans-serif;  color: white; font-weight: bold;" class="animate__animated animate__fadeInDown">{{ $item->tenphim }}</h7>
            </div>
            
            <div style="display: flex; align-items: center" class="row ">
              <div class="col">
                <div class="openModalBtn" data-video-url="{{ asset('videos/' . $item->video) }}" data-target="#videoModal{{$item->id}}">
                  <img src="{{asset('assets1')}}/img/icon-play-vid.svg"  alt="">
                  <span style="text-underline-offset: 2px ; text-decoration: underline; color: white;">Trailer</span>
                  
               
                </div>
               
  
                <!-- The Modal -->
                <div id="videoModal{{$item->id}}" class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                      
                  </div>
                </div>
                
              </div>
              <div style="flex: 1;" class="col-auto">
                <form action="{{ route('datve.kocosuatchieu')}}" method="post">
                  @csrf
                  <input type="hidden" name="phimchon" value="{{ $item->id }}">
                  <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;"> <span>Tìm hiểu thêm</span> </button>
                </form>
              </div>
            </div>
           
           
          </div>
    @endforeach
       </div>

       @else
        <h6 class="no_conten"> KHÔNG CÓ PHIM SẮP CHIẾU</h6>
       @endif
     
  </section>
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')
</body>

</html>