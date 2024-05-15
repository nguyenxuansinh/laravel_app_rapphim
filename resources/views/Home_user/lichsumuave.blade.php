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

   th{
    width: calc(100% / 6);
    font-size: 1rem;
        vertical-align: top;
        text-align: center;
   }
   td {
        max-width: calc(100% / 6); /* Chia đều ra 6 cột */
        font-size: 1rem;
        vertical-align: top;
        text-align: center;
    }
    tr td {
        padding-top: 10px;
        padding-bottom: 10px;
       
    }
    /* Thanh cuộn dọc */
::-webkit-scrollbar {
    width: 8px; /* Chiều rộng của thanh cuộn */
}

/* Nút cuộn */
::-webkit-scrollbar-thumb {
    background-color: #888; /* Màu nền của nút cuộn */
    border-radius: 4px; /* Độ cong của góc */
}

/* Kéo trên thanh cuộn */
::-webkit-scrollbar-track {
    border-radius: 4px;
    background: #f1f1f1; /* Màu nền của thanh cuộn */
}

.modal1 {
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
.modal1-content {
    background-color: rgba(0, 0, 0, 0.8);
    margin: 5% auto;
    padding: 5px;
    width: 40%;
    max-width: 800px;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    
}

.close:hover,
.close:focus {
   
    color: black;
    text-decoration: none;
    cursor: pointer;
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
            padding: 0 20px;
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
    <div  class=" mr-5 ml-5 flex_1">
        <div style=   " margin-right: 20px;background-image: linear-gradient(to right, #64359B, #4058BE);height: max-content;padding: 20px 20px;" class="user_info col-4 w_100 mb-5">
            <div><span style="font-size: 20px;" class="text-white">{{ Auth::user()->danhhieu }}</span></div>
            <div><span class="text-white">Tích điểm C'Friends</span></div>
            <div style="margin-bottom: 10px; display: flex"><div style="color: #f3ea28">{{ Auth::user()->tichdiem }}</div><span class="text-white ">/10k</span></div>
            
            
            @if(Auth::user()->tichdiem >=10000 )
            <a href="{{ route('nangcaphang') }}"><span style="border-radius:5px;max-width: max-content;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px;" class="btn btn-user btn-block">Nâng cấp hạng</span></a>
            @else
            <span style="border-radius:5px;max-width: max-content;background-color: #f3ea28; color: black; font-weight: bold; font-size: 16px; opacity: 0.4;" class="btn btn-user btn-block">Nâng cấp hạng</span>
            @endif
            
            <hr class="centered-hr">
            <div class="mb-2 "><a href="{{ route('user.info_view') }}"class="menu-item"><i style="margin-right: 10px" class="fas fa-user mr-2 "></i> Thông tin khách hàng</a></div>
            <div class="mb-2 "><a style="display: flex" href="{{ route('user.thanhvien') }}" class="menu-item"><i style="margin-right: 10px" class="fas fa-users mr-2 "></i>Thành viên StarCinema</a></div>
            <div class="mb-2 "><a href="{{ route('user.lichsu') }}" class="menu-item"><i style="margin-right: 10px" class="fas fa-history mr-2 "></i>Lịch sử mua hàng</a></div>
            
            <hr class="centered-hr">
            <div class="mb-2 "><a href="{{ route('user.logout') }} "class="menu-item"><i style="margin-right: 10px" class="fas fa-sign-out-alt mr-2 "></i>Đăng xuất</a></div>
            
        </div>
        <div style="width: 100%">
            
            <div style="overflow-y: auto; max-height: 500px;" class="">
                <table style="width: 100% ;">
                    <thead>
        
                        <tr style="background-color: #4058BE; color: white">
                            <th>Mã hóa đơn</th>
                            <th>Ngày thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Phương thức thanh toán</th>
                            <th>Tích điểm</th>
                            <th></th>
                           
                        </tr>
                    </thead>
                   
                    <tbody style="background-color: white; color: black">
                        @foreach ($hoadons as $item)
                            
                        <tr >
                            
                            <td>{{$item->id}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->ngaythanhtoan)->format('d/m/Y') }}</td>
                            <td>{{ number_format($item->tongtien, 0, ',', '.') }} VNĐ</td>
                            <td>{{$item->phuongthucthanhtoan}}</td>
                            <td>{{$item->soluongvedamua*90}} điểm</td>
                            <td class="view-detail"  data-id="{{ json_encode($item->id) }}" data-target="Modal{{$item->id}}" style="color: gray; font-size: 0.8rem; cursor: pointer;">Xem chi tiết</td>
                            <div id="Modal{{$item->id}}" class="modal1" >
                               
                                    
                                           
                                

                                
                            </div>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
                    
                
                
            </div>
        </div>
    </div>
     
</div>
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    
  
 const menuItems = document.querySelectorAll('.menu-item');

// Lặp qua từng phần tử menu và kiểm tra xem trang hiện tại có liên kết với menu đó không
menuItems.forEach(item => {
    if (window.location.href.includes(item.href)) {
        // Nếu trang hiện tại liên kết với menu đó, thêm lớp 'active'
        item.classList.add('active');
    }
});
    

        
        

    $('.view-detail').on('click', function() {
        // Lấy ID từ thuộc tính data-id
        var itemId = $(this).data('id');
    
       console.log(itemId);
        // Gửi yêu cầu AJAX
        $.ajax({
            url:"{{ route('user.xemchitiet') }}", // Địa chỉ URL để gửi yêu cầu
            method: 'POST', // Phương thức của yêu cầu (GET hoặc POST)
            data: { 
                _token: "{{ csrf_token() }}",
                id: itemId 
            }, // Dữ liệu gửi cùng yêu cầu
            success: function(response) {
                let mahoadon = '';
                mahoadon +=response.hoadon[0].id;
                
                
                
                

                let tenphong = '<div class="text-white">' 
                tenphong += response.phongchieu.tenphong;
                tenphong +='</div>'
                

                const ngaychieuString = response.ngaychieu;
                const ngaychieu = new Date(ngaychieuString);


                const gio = ngaychieu.getHours();
                const phut = ngaychieu.getMinutes();

                // Định dạng thời gian theo định dạng 'HH:mm DD/MM/YYYY'
                const ngaychieuFormatted = `${gio < 10 ? '0' + gio : gio}:${phut < 10 ? '0' + phut : phut} ${ngaychieu.getDate()}/${ngaychieu.getMonth() + 1}/${ngaychieu.getFullYear()}`;
                 let giochieu =  '<div class="text-white">'
                    giochieu += ngaychieuFormatted;

                    giochieu += '</div>';
                
                let tenphim = '<div style=" margin-top: 20px;font-size: 20px; font-weight: bold; margin-bottom: 20px" class = "  text-white">';
                tenphim +=response.phim.tenphim;

                tenphim += '</div>';
                let sovemua ='<div class="text-white">'
                response.hoadon.forEach(hoadon =>{
                    var sove = hoadon.soluongvedamua;
                    
                    sovemua +=sove;
                })
                sovemua += '</div>';
                let html = '<div class="text-white">';

                response.chongoi.forEach(chongoi => {
                    let tenGhe = chongoi.ghevatly.tenghe;
                    html += tenGhe + ', ';
                });

                // Loại bỏ dấu phẩy cuối cùng nếu có
                html = html.slice(0, -2);

                html += '</div>';

                

                var chuoi = '<div class="modal1-content" style="background-color: #3366CC; border-radius: 10px; padding-left: 20px">'+
                                        '<button  style="padding: 5px" type="button" class="close" >&times;</button>'+                               
                                                tenphim+             
                                            
                                           '<div style=" font-size: 20px; font-weight: bold" class = "text-white">StarCinema</div>'+
                                           '<div style="margin-bottom: 20px;" class = "text-white">25 Hai Bà Trưng,Vĩnh Ninh, Thành Phố Huế , Thừa Thiên Huế</div>'+
                                           '<div  style="display: flex; align-items: center; margin-bottom:20px;"><div style="color: #F3EA28;margin-right: 10px;">Mã hóa đơn :</div>'+
                                            
                                            '<div class="text-white">'+mahoadon+'</div></div>'+
                                           '<div style="margin-bottom: 20px;" class="row">'+
                                              '<div class="col">'+
                                                '<div style="color: #F3EA28">Phòng chiếu</div>'+
                                                tenphong+
                                              '</div>'+
                                              '<div class="col">'+
                                              '<div style="color: #F3EA28">Thời gian</div>'+
                                                    giochieu +
                                              '</div>'+
                                           '</div>'+
                            
                                            '<div style="margin-bottom: 20px;" class="row">'+
                                              '<div class="col">'+
                                                '<div style="color: #F3EA28">Số lượng vé</div>'+
                                                sovemua+
                                              '</div>'+
                                              '<div class="col">'+
                                                '<div style="color: #F3EA28">Ghế đã chọn</div>'+
                                                html+
                                              '</div>'+
                                            '</div>'+
                            
                                           
                                        '</div>'+
                            
                                       '<div style="width: 100%">'+
                                        '<form   method="POST" action="">'+
                                           ' @csrf'+
                                            '<input type="hidden" name="guimahoadon" value="">'
                                           
                                              '<button style="background-color: #f3ea28; color: black; font-weight: bold; width: 80%; margin-bottom: 1rem; margin-left: auto;margin-right: auto;" type="submit" class="btn btn-user btn-block">GỬI LẠI EMAIL</button>'+
                                            
                                        '</form>'+
                                       '</div>'+
                                       
                                    '</div>;'+
                $('#Modal'+itemId).html(chuoi);
                $('#Modal'+itemId).css('display', 'block');

                $('.modal1').on('click', '.close', function() {
    var modalId = $(this).closest('.modal1').attr('id'); // Lấy id của modal gần nhất
    $('#' + modalId).css('display', 'none'); // Ẩn modal khi nút "close" được nhấn
    $('#' + modalId).html(''); // Xóa nội dung của modal
});
               

                window.addEventListener('click', function(event) {
                var modal1s = document.querySelectorAll('.modal1');
                modal1s.forEach(function(modal) {
                    if (event.target == modal) {
                        
                        modal.style.display = "none";
                        modal.innerHTML = "";
                      
                        
                        
                        }
                        });
                    });
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.log('Error:', error);
            }
        });
    });
  </script>
  @include('Home_user.layouts.footer')
 
</body>

</html>