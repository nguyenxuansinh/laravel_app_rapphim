
   ======= Header ======= 

  <style>
    .navbar .getstarted, .navbar .getstarted:focus {
    background: #f3ea28;
   
    color: black;
    }
    .navbar .getstarted:hover, .navbar .getstarted:focus:hover {
      background: #f3ea28;
   
   color: black;
  }
  .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover>a {
    color: white;
  }
  .navbar .dropdown ul a:hover, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover>a {
    color: white;
  }
  a:hover{
      text-decoration: none;
  }

  .navbar ul li a{
    color: white;
  }
  .navbar ul li i{
    color: white;
  } 
  .navbar .dropdown ul,
  .thongtincanhan{
    background-color: #0f172a;
  }
  .container1 {
    
    width: 100%;
    
    margin-right: auto;
    margin-left: auto;
  } 
  @media (min-width: 1025px) {
    .container1 {
        max-width: 1000px;
    }
  }
  
  @media (min-width : 740px) and (max-width : 1023px){
    .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover>a {
    color: black;
  }
  .navbar .dropdown ul a:hover, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover>a {
    color: black;
  }
  .navbar ul li a{
    color: black;
  }
  .navbar ul li i{
    color: black;
  }
  .navbar .dropdown ul,
  .thongtincanhan{
    background-color: white;
  }

  .mobile-nav-toggle{
    color: white;
    padding: 10px 20px;
  }

	
  }

  

  
@media (max-width : 739px){
  .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover>a {
    color: black;
  }
  .navbar .dropdown ul a:hover, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover>a {
    color: black;
  }
  .navbar ul li a{
    color: black;
  }
  .navbar ul li i{
    color: black;
  }
  .navbar .dropdown ul,
  .thongtincanhan{
    background-color: white;
  }
  .mobile-nav-toggle{
    color: white;
    padding: 10px 20px;
  }
}

  

  </style>


<header style="background-color: #0f172a;" id="header" class="fixed-top d-flex align-items-center">
  <div class="container1 d-flex align-items-center">

    <h1 class="logo me-auto"><a style="color: white;" href="{{ route('user.index') }}">StarCinema</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    <div style="display: flex; align-items: center; background-color: white;padding: 5px 10px;border-radius: 20px;position: relative;z-index: 2;">
     
      <form id="search-form" action="{{ route('user.search') }}" method="GET" style="background: transparent;">
        <marquee  id="myMarquee" behavior="scroll" direction="left" style="position: absolute; top: 50%; transform: translateY(-50%); z-index: -1;">Nhập tên phim hoặc tên đạo diễn</marquee>
        <input  name="search" id="search-input" style="width: initial;outline: none; border: none; z-index: 5;background: transparent " oninput="checkInput()" type="text" >
        <i class="fas fa-search"></i>
      </form>
     
    </div>
    
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{ route('user.index') }}" class=" active ">Home</a></li>

       
        <li><a  href="{{ route('user.gioithieu') }}">Giới thiệu</a></li>
        
       
        @if (Auth::check())
        <li  class="dropdown"> <a href="#"><span  >{{ Auth::user()->hovaten }}</span> <i class="bi bi-chevron-down"></i></a>
          <ul class="thongtincanhan">
            <li><a href="{{ route('user.info_view') }}">Thông tin cá nhân</a></li>
            <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
          </ul>
        </li>
       @else
        <li style="display: flex; align-items: center;padding-left: 30px;">
            <i  class="fas fa-user"></i>
            <a style="padding-left: 5px;text-decoration-thickness: 2px;text-underline-offset: 8px ; text-decoration: underline;"  href="{{ route('user.login') }}">Đăng nhập</a>
        </li>
        <span style="font-size: 24px;color: white;padding: 2px;">/</span>
        <li><a style="padding-left: 5px ;text-decoration-thickness: 2px;text-underline-offset: 8px ; text-decoration: underline;  "  href="{{ route('user.register') }}">Đăng kí</a></li>
        @endif
        
        <li><a href="{{ route('phimdangchieu.detail') }}" class="getstarted">ĐẶT VÉ NGAY</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>

</header>
<script>
  function checkInput() {
        var input = document.getElementById("search-input");
        var marquee = document.getElementById("myMarquee");
        if (input.value.trim() !== "") {
            marquee.style.display = "none";
        } else {
            marquee.style.display = "block";
        }
    }
    const form = document.getElementById('search-form');
    const input = document.getElementById('search-input');

    input.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            form.submit();
        }
    });
    
</script>
  
  
  <!-- End Header -->
  