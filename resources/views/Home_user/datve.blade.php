

<!DOCTYPE html>
<html lang="en">

@include('Home_user.layouts.head')

<style>

    body {
        overflow-x: hidden; /* Khóa cuộn ngang */
    }
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
    .menu-giochieu:hover,
    .menu-ngay:hover,
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

    #ajaxSuccessContent{
        display: none;
    }
    .ghe_chon{
        display: flex;
        color: white;
    }

    .soluong{
        width: 500px;
    }

    .giuve{
        display: flex;
    }
    .thoigiangiuve{
        border-radius: 5px;width: 150px;height: 100px;background-color: #f3ea28; margin-right: 20px;
    }

    .thoigiangiuve_conten{
        height: 100px;
    /* text-align: center; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }
    .sessionLifetime{
        font-size: 24px;font-weight: bold;
    }
    .manhinh{
        margin-top: -3.9rem;color: white;text-align: center;font-size: 2rem;
    }
    @media (min-width : 1025px){
        .container{
            max-width: 960px;
        }
    }  
    @media (min-width : 740px) and (max-width : 1023px){
        .ghe_chon{
        display: flex;
        width: 100px;
        color: white;
        }
        .modal-content {
            background-color: rgba(0, 0, 0, 0.8);
            margin: 5% auto;
            padding: 5px;
             width: 100%; 
            max-width: 800px;
        }
        .modal_het_time_content1,
        .modal_het_time_content {
            width: max-content;
            height: 12rem;
            margin: 25% auto;
        }
	}

    @media (max-width : 739px){
        .soluong{
        width: auto;
        
    }
    .table_ghe{
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
            height: 400px;
            width: 100%;
            cursor: pointer;

        }

        .seat-table table td {
            width: 50px;
        }
        
        .user_datve_conten{
            display: block;
            padding: 20px;
        }
        .giuve{
        display: block;
        }
        .thoigiangiuve{
            width: max-content;
            height: max-content;
        }
        .thoigiangiuve_conten{
            padding: 10px;
        display: flex;
        align-items: center;
        flex-direction: row;
        align-content: center;
        justify-content: center;
        height: max-content;
        }
        .sessionLifetime{
            font-size: 1rem;
            margin-left: 10px;
        }

        .manhinh{
            margin-top: -0.5rem;
        }
        .modal-content {
            background-color: rgba(0, 0, 0, 0.8);
            margin: 5% auto;
            padding: 5px;
             width: 100%; 
            max-width: 800px;
        }
        .modal_het_time_content1,
        .modal_het_time_content {
            width: max-content;
            height: 12rem;
            margin: 25% auto;
         }
         .table_ghe::-webkit-scrollbar {
            width: 10px; 
            /* Độ rộng của thanh cuộn */
            }
            .table_ghe::-webkit-scrollbar-track {
             background: rgba(255,255,255,0.3); /* Màu nền của thanh cuộn */
            }
            .table_ghe::-webkit-scrollbar-thumb {
    background-color: #ccc; /* Màu nền của phần cuộn */
    border-radius: 4px; /* Độ cong của góc của phần cuộn */
}
.table_ghe::-webkit-scrollbar {
    height: 10px; /* Độ cao của thanh cuộn */
}
    }

    
</style>

<body style="background-color: #0F172A;">

  <!-- ======= Header ======= -->
  @include('Home_user.layouts.header')
  <!-- End Header -->

  <div style="margin-top: 130px; margin-bottom: 40px;" class="container">
    <?php
         $phim_ = 'phim_' . Auth::user()->id;
         $suatchieus_ngay_ = 'suatchieus_ngay_' . Auth::user()->id;
         $suatchieus_gio_ = 'suatchieus_gio_' . Auth::user()->id;
         $chongio_ = 'chongio_' . Auth::user()->id;
         $phongchieu_ = 'phongchieu_' . Auth::user()->id;
         $giave_ = 'giave_' . Auth::user()->id;
         $seatRows_ = 'seatRows_' . Auth::user()->id;
         $id_ghe_dat_ = 'id_ghe_dat_' . Auth::user()->id;
         $so_luong_ = 'so_luong_' . Auth::user()->id;
         $tongTien_ = 'tongTien_' . Auth::user()->id;
         $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
    ?>
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

    <div style="display: flex; align-items: center;justify-content: center; margin-top: 20px;">
        @foreach (session($suatchieus_ngay_) as $item)
        @if(now() > $item['ngay'])   
        <div style="margin-right: 20px" >
           
                <?php
                  
                // Định dạng thời gian chiếu từ trường "thoigianchieu" của đối tượng $item

            
                $formattedDateTime = \Carbon\Carbon::parse($item['ngay'])->isoFormat('DD/MM ');

                // Lấy thứ từ ngày đã định dạng

                $dayOfWeek = \Carbon\Carbon::parse($item['ngay'])->isoFormat('dddd');

                ?>
                
                <div style="border-color: rgba(255, 255, 255, 0.4); color: rgba(255,255,255,0.4)"  class="btn ngaychieu menu-ngay" >
                    <div> 
                        <div style="font-weight: bold; color: rgba(255,255,255,0.4)">{!! mb_convert_case($formattedDateTime, MB_CASE_TITLE, 'UTF-8') !!}</div>
                        <div style="font-weight: bold;color: rgba(255,255,255,0.4)">{!! mb_convert_case($dayOfWeek, MB_CASE_TITLE, 'UTF-8') !!}</div>
                    </div>
                </div>
            
        </div>
        @else
        <div style="margin-right: 20px" >
            <form class="ajax-form" data-ngay="{{ json_encode($item['ngay']) }}" action="{{route('ngaychieu.giochieu',['ngaychieu'=>$item['ngay']])}}" method="post">
                @csrf
                <?php
                  
                // Định dạng thời gian chiếu từ trường "thoigianchieu" của đối tượng $item

            
                $formattedDateTime = \Carbon\Carbon::parse($item['ngay'])->isoFormat('DD/MM ');

                // Lấy thứ từ ngày đã định dạng

                $dayOfWeek = \Carbon\Carbon::parse($item['ngay'])->isoFormat('dddd');

                ?>
                
                <button type="submit" class="btn ngaychieu menu-ngay"  data-href="{{route('ngaychieu.giochieu',['ngaychieu'=>$item['ngay']])}}">
                    <div> 
                        <div style="font-weight: bold">{!!  mb_convert_case($formattedDateTime, MB_CASE_TITLE, 'UTF-8') !!}</div>
                        <div style="font-weight: bold">{!!  mb_convert_case( $dayOfWeek, MB_CASE_TITLE, 'UTF-8') !!}</div>
                    </div>
                    
                </button>
                
            </form>
        </div>
       
        @endif  
        @endforeach
    </div>


   
    <div id = "suatchieu">

    </div>
    
    <div id = "soluong_ghe">

    </div>

   

   
 
   

    

    
  

   </div>
  
   
    

  </div>






    <div class="user_datve">
        <div class="user_datve_conten container">
            <div>
                <div style="font-size: 24px; font-weight: bold ; color: white">
                    @if(session()->has($phim_))
                    {{ session($phim_)->tenphim }}
                    @endif
                
                </div>
                <div style="display: flex; color: white">
                    StarCinema |
                    
                    <div  style="margin: 0 5px ; color: white" id="chon_sl">
                        @if (Session::has($so_luong_)) 
                        {{ session($so_luong_) }} 
                        @else
                         0
                        @endif
                        
                    
                    
                    </div>
                    
                    
                </div>
                <div style="display: flex;">
                    <div id="phongchieu" style="color: white">
                      
                    </div>
                    <div class ="ghe_chon">
                      

                    </div>
                    <div id="giochieu" style="margin: 0 5px; color: white">
                      
                    </div>

                </div>
                
                
            </div>
            <div class = "giuve" >
                <div class="thoigiangiuve">
                
                    <div class="thoigiangiuve_conten" >
                        <div class="text-center text-black">Thời gian giữ vé: </div>

                       
                        <div class ="sessionLifetime"  class="text-center text-black" id="sessionLifetime">
                           05:00
                        </div>
                       
                        
                        
                    </div>
                   
                
                </div>
                <div style="display: flex;flex-direction: column;"> 
                    <div style="display: flex; margin-right: 20px; font-size: 1.2rem; color: white ; margin-bottom: 1.5rem">Tạm tính : <div style="margin: 0 5px; float: right ; color: white" id="tam_tinh">@if(session()->has($tongTien_)) {{ session($tongTien_) }} @endif </div>Đ </div> 
                    
                    
                    
                    <div id="datve">
                        <div style="background-color: #f3ea28; height: 40px; line-height: 40px;border-radius: 5px;font-size: 18px; font-weight: bold ; opacity: 0.5;" class="  text-center text-black">Đặt vé</div>
                    </div>
                        
                        
                       
                        
                      
                    
                   
                        
                   


                    
                  
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

     

      <div id="het_time_giucho1" class='modal_het_time1'>
    
        <div class='modal_het_time_content1'>
            <div style="font-size: 24px;" class="text-center text-white">LƯU Ý!</div>
            <div style="font-size: 20px;" class="text-center text-white">Ghế này đã được đặt</div>
    
            <div style="margin-top: 20px">
                <form action="{{ route('datve.index')}}" method="POST">
                    @csrf
                   
                    <button type="submit"  class="btn d-block mx-auto " style="background-color: #F3EA28;font-weight: bold;color: black;width: 50%;"> <span>OK</span> </button>
                  </form>
            </div>
        </div>
            
      </div>
    
   

  

  <!-- ======= Footer ======= -->
 
  @include('Home_user.layouts.footer')
  @if(isset($mo) && $mo === 0)
      <script>
        console.log("iseet : mở");
        document.querySelector('.modal_het_time1').style.display = "block";
      </script>
  @endif
  <script>
    var xemthem = document.querySelector('.expand-button');

xemthem.addEventListener('click',function(){
    if(xemthem.textContent == "Xem thêm"){
        var mota = document.querySelector('.mota');
        mota.style.height = 'auto';
        xemthem.innerHTML = 'Thu gọn';
    }else{
        var mota = document.querySelector('.mota');
        mota.style.height = '100px';
        xemthem.innerHTML = 'Xem thêm';
    }
    
});
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
 
  <script>

  //  var element = document.getElementById('scrollTarget');
//var elementRect = element.getBoundingClientRect();
//var absoluteElementTop = elementRect.top + window.pageYOffset;
//var middle = absoluteElementTop - (window.innerHeight / 2);
//window.scrollTo(0, middle);
 
const menuItems = document.querySelectorAll('.menu-ngay');

// Lặp qua từng phần tử menu và kiểm tra xem trang hiện tại có liên kết với menu đó không
menuItems.forEach(item => {
    item.addEventListener('click', function() {
       
        menuItems.forEach(menuItem => {
            menuItem.classList.remove('ngaychieu_active');
        });

       
        item.classList.add('ngaychieu_active');
    });
});

const assetPath = '{{ asset('assets1') }}';
function renderSeats(seatRows, id_ghe_dat_, ds_ghe_) {
    let tableBody = $('#seatTableBody');
    tableBody.empty(); // Xóa nội dung cũ

    $.each(seatRows, function(row, seatsInRow) {
        let rowElement = $('<tr>').css({ 'margin-top': '20px', 'display': 'flex' });

        let rowHeader = $('<td>').css({ 'margin-right': '20px', 'align-items': 'center', 'display': 'flex', 'flex': '1', 'justify-content': 'center' }).text(row);
        rowElement.append(rowHeader);

        $.each(seatsInRow, function(index, seat) {
            let seatElement = $('<td>').css({ 'align-items': 'center', 'display': 'flex', 'flex': '1', 'justify-content': 'center' });

            if (id_ghe_dat_.includes(seat.id)) {
                let seatDiv = $('<div>').css({ 'background-color': 'transparent', 'border': 'none', 'outline': 'none', 'padding': '0', 'position': 'relative' });

                let seatImg = $('<img>').attr('src','{{ asset('assets1/img/seat-single-disable.svg') }}').css('width', '100%');
                let seatSpan = $('<span>').text(seat.tenghe).css({ 'left': '50%', 'top': '100%', 'transform': 'translateX(-50%)', 'z-index': '2', 'font-size': '0.9rem', 'position': 'absolute', 'color': 'white' });

                seatDiv.append(seatImg).append(seatSpan);
                seatElement.append(seatDiv);
            } else {
                var route = `{{ route('datghe.maghe') }}`;

                let form = $('<form>').addClass('myForm').attr('action', route).attr('method', 'post');
                form.append($('<input>').attr('type', 'hidden').attr('name', '_token').val('{{ csrf_token() }}'));
                form.append($('<input>').attr('type', 'hidden').attr('name', 'seat_id').val(seat.id));

                let danhSachGhe = $('<div>').addClass('danh-sach-ghe');
                let seatButton = $('<button>').css({ 'background-color': 'transparent', 'border': 'none', 'outline': 'none', 'padding': '0', 'position': 'relative' }).addClass('seat-button submitForm').data('seat', seat);

                if (ds_ghe_ && ds_ghe_.map(ghe => ghe.id).includes(seat.id)) {
                    seatButton.append($('<img>').attr('src', '{{ asset('assets1/img/seat-single-selecting.svg') }}').css('width', '100%'));
                } else {
                    seatButton.append($('<img>').attr('src', '{{ asset('assets1/img/seat-single.svg') }}').css('width', '100%'));
                }

                seatButton.append($('<span>').text(seat.tenghe).css({ 'left': '50%', 'top': '100%', 'transform': 'translateX(-50%)', 'z-index': '2', 'font-size': '0.9rem', 'position': 'absolute', 'color': 'white' }));
                danhSachGhe.append(seatButton);
                form.append(danhSachGhe);
                seatElement.append(form);
            }

            rowElement.append(seatElement);
        });

        tableBody.append(rowElement);
    });
}
$('.ajax-form').on('click', function(e){
            e.preventDefault(); // Ngăn chặn hành vi mặc định của form

            var seatData = $(this).data('ngay');
            
            var url = $(this).attr('action');
         
            console.log(seatData);
            console.log(url);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: csrfToken,
                ngaychieu: seatData
            },
            success: function(response) {
                console.log(response); // Kiểm tra kết quả AJAX
              
                let html = '';
                var suatchieus_gio = response.suatchieus_gio;
                html += '<p id="scrollTarget" style="margin: 40px 0; font-size: 20px;font-weight: bold;" class="text-center text-white">Chọn suất chiếu</p>' +
                        '<div style="display: flex; align-items: center;justify-content: center; margin: 20px 0;">';
                
                suatchieus_gio.forEach(function(item) {
                    var gioHienTai = moment();
                    var ngayGioSuatChieu = moment(item.thoigianchieu, 'YYYY-MM-DD HH:mm:ss');
                    var gio = moment(item.thoigianchieu, 'YYYY-MM-DD HH:mm:ss').format('HH:mm');
                    var route = `{{ route('datve.suatchieu') }}`;
                    if (moment(gioHienTai, 'HH:mm').isAfter(moment(ngayGioSuatChieu, 'HH:mm'))) {
                        html += '<div style="margin-right: 20px">' +
                           
                           
                            '<button style=" border-color: rgba(255, 255, 255, 0.4);color:rgba(255,255,255,0.4)" class="btn ngaychieu menu-giochieu" data-id="' + item.id + '">' +
                            gio +
                            '</button>' +
                            
                            '</div>';
                        console.log("Giờ hiện tại lớn hơn giờ của suất chiếu");
                    } else {
                        html += '<div style="margin-right: 20px">' +
                            '<form class="form_xuatchieu"  data-id="' + item.id + '" action="' + route + '" method="POST">' +
                            '@csrf' +
                            '<input type="hidden" name="id_suatchieu" value="' + item.id + '">'+
                            '<button type="submit" class="btn ngaychieu menu-giochieu" data-id="' + item.id + '">' +
                            gio +
                            '</button>' +
                            '</form>' +
                            '</div>';
                        console.log("Giờ hiện tại không lớn hơn giờ của suất chiếu");
                    }

                  
                   
                });

                html += '</div>';
                console.log(html);
                $('#suatchieu').html(html);
                let soluong_ghe = $('#soluong_ghe');
                soluong_ghe.empty(); 
                const giochieus = document.querySelectorAll('.menu-giochieu');


                giochieus.forEach(item => {
                    
                    item.addEventListener('click',function(){
                        giochieus.forEach(ite => {
                            ite.classList.remove('ngaychieu_active');
                        });
                        item.classList.add('ngaychieu_active');
                    });
                });
                $('.form_xuatchieu').on('click', function(e){
                    e.preventDefault(); // Ngăn chặn hành vi mặc định của form

                    var id = $(this).data('id');
                   
                    var url_suatchieu = $(this).attr('action');
                    
                    $.ajax({
                        url: url_suatchieu,
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_suatchieu: id
                        },
                        success: function(response) {
                            
                            console.log(response);
                            let tenPhongChieu;
                            response.phongchieu_.forEach(function(row) {
                                tenPhongChieu = row.tenphongchieu;
                            });
                            $('#phongchieu').html('Phòng chiếu ' + tenPhongChieu + ' |');
                            let tengiochieu;
                            response.chongio_.forEach(function(row) {
                                tengiochieu = row.giochieu;
                            });
                            
                            $('#giochieu').html('| '+tengiochieu);
                            let html = '';
                            html +=' <p style="margin:20px 0; font-size: 20px;font-weight: bold;" class="text-center text-white">Mua vé</p>'+
                                    '<div class="soluong" style="margin: auto; border: 1px solid #f3ea28;border-radius: 5px;">'+
                                        '<p style="margin:20px 0; font-size: 20px;font-weight: bold;" class="text-center text-white">Người lớn / <span style="color: #f3ea28">Đơn</span></p>'+
                                       '<p style="margin:20px 0; font-size: 20px;font-weight: bold;" class="text-center text-white">'+response.giave_.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }).replace('₫', ' VND')+'</p>'+
                                        '<div class="count">'+
                                            '<div class="count-btn count-minus">'+
                                                '<i class="fas fa-minus icon"></i>'+
                                            '</div>'+
                                            
                                            '<p class="count-number">{{ session($so_luong_,0) }}</p>'+
                                            '<div class="count-btn count-plus">'+
                                                '<i class="fas fa-plus icon"></i>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                            
                                    '<div>'+
                                        '<div style="margin: 40px 0;">'+
                                            '<img style="width: 100%" src="{{ asset("assets/img/img-screen.png") }}" class="lazyload" alt=""> '+
                                            '<div class = "manhinh">Màn hình</div>'+
                                        '</div>'+

                                        
                                        '<div id="success-toast" style="display: none" class="alert alert-success" role="alert">'+
                                                
                                        '</div>'+
                                        '<div class="seat-table table_ghe">'+
                                            '<table id="seatTableBody">'+
                                              
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div style="display: flex; justify-content: center; margin-top: 40px;">'+
                                        '<div style="margin: 0 20px;display: flex;flex-direction: column;align-items: center;">'+
                                            '<img style="width: 3.2rem" src="{{asset('assets1/img/seat-single-disable.svg')}}"  class="lazyload" alt="">'+
                                            '<div class="text-white text-center">Ghế đã đặt</div>'+
                                        '</div>'+
                                        '<div style="margin: 0 20px;display: flex;flex-direction: column;align-items: center;">'+
                                            '<img style="width: 3.2rem; " src="{{ asset('assets1/img/seat-single.svg') }}" class="lazyload" alt="">'+
                                            '<div class="text-white text-center">Ghế trống</div>'+
                                        '</div>'+
                                        '<div style="margin: 0 20px;display: flex;flex-direction: column;align-items: center;">'+
                                            '<img style="width: 3.2rem" src="{{ asset('assets1/img/seat-single-selecting.svg') }}" class="lazyload" alt="">'+
                                            '<div class="text-white text-center">Ghế chọn</div>'+
                                        '</div>'+
                                    '</div>';
            

                            


                            $('#soluong_ghe').html(html);
                            renderSeats(response.seatRows, response.id_ghe_dat_, response.ds_ghe_);
                            

                            var countNumber = $('.count-number');
                            var countNumber1 = $('.count-number1');
                            var countMinus = $('.count-minus');
                            var countPlus = $('.count-plus');

                            
                            countPlus.click(function() {
                                var currentValue = parseInt(countNumber.text());
                                var currentValue1 = parseInt(countNumber1.text());
                                countNumber.text(currentValue + 1);
                                countNumber1.text(currentValue1 + 1);
                                luuGiaTriSoLuong(countNumber.text());
                                $('.ghe_chon').empty();
                                
                            });
                            countMinus.click(function() {
                                var currentValue = parseInt(countNumber.text());
                                var currentValue1 = parseInt(countNumber1.text());
                                if (currentValue > 0) {
                                    countNumber.text(currentValue - 1);
                                    countNumber1.text(currentValue1 - 1);
                                    luuGiaTriSoLuong(countNumber.text());
                                    $('.ghe_chon').empty();
                                    
                                }
                            
                            });


                            // Hàm gửi yêu cầu AJAX
                            function luuGiaTriSoLuong(value) {
                                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    url: "{{ route('luu_gia_tri_so_luong') }}",
                                    type: "POST",
                                    data: {
                                        _token: csrfToken,
                                        so_luong: value
                                    },
                                    success: function(response) {
                                        console.log("tong tien " +response.tongtien);
                                        console.log("soluong " +response.so_luong);
                                        var soluong =response.so_luong;
                                        var tamtinh =response.tongtien;
                                        document.getElementById('chon_sl').innerHTML = soluong;
                                        document.getElementById('tam_tinh').innerHTML = tamtinh;
                                        

                                        $.ajax({
                                        url: "{{ route('datghe.maghe') }}",
                                        type: "POST",
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                            
                                        },
                                        success: function(response) {
                                            
                                            if (response.ds_ghe.length == 0) { 
                                            
                                                $('.danh-sach-ghe .seat-button img').attr('src', '{{ asset('assets1/img/seat-single.svg') }}');
                                            
                                            }
                                        
                                            
                                            
                                        },
                                        error: function(xhr) {
                                            console.error(xhr.responseText);
                                        }
                                        });
                                
                                    },
                                    error: function(xhr) {
                                        console.error(xhr.responseText);
                                    }
                                });
                            }

                            $('.submitForm').on('click', function(e) {
                                            e.preventDefault();
                                        
                                    
                                            var seatData = $(this).data('seat');
                                            console.log("seatdata",seatData);
                                            var button = $(this);
                                            $.ajax({
                                                url: "{{ route('datghe.maghe') }}",
                                                method: 'POST',
                                                data: {
                                                    _token: "{{ csrf_token() }}",
                                                    seat_id: seatData.id
                                                },
                                                success: function(response) {

                                                    console.log(response.du_ghe);
                                                    console.log(response.so_luong);
                                                    if(response.du_ghe == response.so_luong) {
                                                        $("#datve").html('<a href="{{ route("thanhtoan") }}" class="text-black"><div style="background-color: #f3ea28; height: 40px; line-height: 40px;border-radius: 5px;font-size: 18px; font-weight: bold; " class="text-center text-b">Đặt vé</div></a>');
                                                    }else{
                                                        $("#datve").html('<div style="background-color: #f3ea28; height: 40px; line-height: 40px;border-radius: 5px;font-size: 18px; font-weight: bold ; opacity: 0.5;" class="  text-center text-black">Đặt vé</div>');
                                                    }
                                                    
                                            
                                                
                                                    if(response.expires_at){
                                                        setInterval(function() {
                                                                    var currentTime = Math.floor(Date.now() / 1000); // Thời gian hiện tại tính theo giây
                                                                    var sessionExpiresAt = response.expires_at;
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
                                                                        console.log("00 : mở");
                                                                        document.querySelector('.modal_het_time').style.display = "block";
                                                                       
                                                                        
                                                                        
                                                                       
                                                                       
                                                                    }
                                                                    
                                                                }, 1000);
                                                    }
                                                    if(response.message){
                                                        var successToast = $("#success-toast");
                                                        successToast.html(response.message);
                                                        successToast.fadeIn("slow");

                                                        setTimeout(function() {
                                                            successToast.fadeOut("slow", function() {
                                                                $(this).html(""); // Xóa nội dung của toast sau khi hoàn thành hiệu ứng fadeOut
                                                            });
                                                        }, 3000); 
                                                    }

                                                    if(response.mo==0){
                                                        document.querySelector('.modal_het_time1').style.display = "block";
                                                    }
                                                    
                                                
                                                    console.log("ds");
                                                    console.log(response.ds_ghe);
                                                    let tempArray = [];
                                                    var tenGhe = '';
                                                    if (response.ds_ghe == "") { 
                                                        $('.ghe_chon').empty();
                                                        $('.danh-sach-ghe .seat-button img').attr('src', '{{ asset('assets1/img/seat-single.svg') }}');
                                                        
                                                    }else if (response && response.ds_ghe && Array.isArray(response.ds_ghe)) {
                                                            
                                                            response.ds_ghe.forEach((element, index) => {
                                                                tempArray.push(element.tenghe);
                                                                
                                                                if (element.tenghe === seatData.tenghe) {
                                                                    
                                                                    
                                                                    // Nếu tìm thấy ghế tương ứng, thay đổi hình ảnh của nút ghế
                                                                    button.find('img').attr('src', '{{ asset('assets1/img/seat-single-selecting.svg') }}');
                                                                }else{
                                                                    button.find('img').attr('src', '{{ asset('assets1/img/seat-single.svg') }}');
                                                                    
                                                                }

                                                                
                                                            
                                                            });

                                                            tempArray.sort((a, b) => {
                                                                // Trích xuất số ghế từ chuỗi, ví dụ: A02 -> 02
                                                                const seatNumberA = parseInt(a.substring(1));
                                                                const seatNumberB = parseInt(b.substring(1));
                                                                // So sánh số ghế và trả về kết quả
                                                                return seatNumberA - seatNumberB;
                                                            });
                                                            tenGhe += ' ';
                                                            tenGhe = tempArray.join(' , ');

                                                        
                                                            $('.ghe_chon').text(tenGhe);
                                            
                                                    }
                                                    
                                                
                                                    
                                                },
                                                error: function(xhr) {
                                                    // Xử lý lỗi nếu có
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                            
                                        });

                        },

                        error: function(xhr) {
                            // Xử lý lỗi nếu có
                            console.error(xhr.responseText);
                        }
                        });
                     });
                
         
            },

            error: function(xhr) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
            });
        });
   

                                    



    
   
    





   

   
       
   
   
  </script>

  
  
</body>

</html>