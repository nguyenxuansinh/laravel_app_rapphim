<?php

namespace App\Http\Controllers;

use App\Mail\forgot_pass;
use App\Mail\thongtindatve_email;
use App\Mail\verify;
use App\Models\banner;
use App\Models\Chongoi;
use App\Models\ghe;
use App\Models\Hoadon;
use App\Models\Luutam;
use App\Models\phim;
use App\Models\phongchieu;
use App\Models\suatchieu;
use App\Models\User;

use Carbon\Carbon;


use chillerlan\QRCode\QRCode ;
/*use Illuminate\Contracts\Session\Session;*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index()
    {
        
        $banners = banner::all();
        $phimdangchieu= Phim::where('trangthai', 'đang chiếu')->get();
        $phimsapchieu = Phim::where('trangthai', 'sắp chiếu')->get();
       
        return view("home_user.index",['banners' => $banners,'phimdangchieu'=>$phimdangchieu,'phimsapchieu'=>$phimsapchieu]);
    }
    public function phimdangchieu_detail()
    {
        
        $phimdangchieu= Phim::where('trangthai', 'đang chiếu')->get();

       
        return view("home_user.phimdangchieu",['phimdangchieu'=>$phimdangchieu]);
    }
    public function phimsapchieu_detail()
    {
        
        $phimsapchieu = Phim::where('trangthai', 'sắp chiếu')->get();
       
        return view("home_user.phimsapchieu",['phimsapchieu'=>$phimsapchieu]);
    }

    public function user_info_view(){ 
       
            return view("home_user.user_info");
    }
    
    public function login(){
        return view("User.login");
    }
    public function checklogin(Request $request){
        
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'phanquyen'=>0 ])) {
            if (auth()->user()->email_verified_at !== null) {


            return redirect()->route('user.index');
            }else{
                $user = User::where('email', $request->email)->first();
                $tieude = "Hi : " . $user->hovaten;
                Mail::to($user->email)->send(new verify($tieude, $user));
                abort(403, 'Tài khoản chưa active. Hãy vào email để active');
                
            }
        } else {
            abort(403, 'Unauthorized action.');
           
        }
    }
    public function logout( )
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('user.index')->withHeaders([
            'Refresh' => '0'
        ]);
    }

    public function register(){
        return view("User.register");
    }

    public function store(Request $request){

        
        $request->validate([
            'hovaten' => 'required|string|max:255',
            'diachi' => 'required|string|max:255',
            'sodienthoai' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        
        
        $user = User::create([
            'hovaten' => $request->hovaten,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sodienthoai,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phanquyen' => 0,
            'danhhieu'=>"C'Friends",
        ]);

        if ($user) {
            $tieude = "Hi : " . $user->hovaten;

            Mail::to($user->email)->send(new verify($tieude, $user));

            return redirect()->route('user.login');
        }




        return redirect()->back();
    }

    public function verify($email){
        User::where('email',$email)->whereNull('email_verified_at')->firstOrFail();
        
        User::where('email',$email)->update(['email_verified_at' => date('Y-m-d')]);
        
        return redirect()->route('user.login');
    }

    public function for_got(){
      
        return view("User.forgot_pass");
    }


    public function for_got_check(Request $request){
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $tieude = "Hi : " . $user->hovaten;

            Mail::to($email)->send(new forgot_pass($tieude, $user));
            return redirect()->back()->with('success', 'Email đã được gửi thành công!');
        }else{
            return redirect()->back()->withErrors(['email' => 'Không tìm thấy với email này.']);
        }
        
       
    }

    public function change_pass($email){
        return  view("User.doi_mat_khau", ['email' => $email]);
    }


    public function doimatkhau(Request $request){

        $request->validate([
            'password' => 'required|min:8',
            'repeatpassword' => 'required|same:password',
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return  redirect()->route('user.login');
    }

    


    public function update(Request $request){
      
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
           
        ]);

        $user = User::find(Auth::user()->id) ;

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        $user->update ([
            'password' => Hash::make($request->password),
        ]); 
       

        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
       
    
    }

    public function update_info(Request $request){
      
       
        $user = User::find(Auth::user()->id) ;

       

        $user->update ([
            'hovaten'=>$request->input('hovaten'),
            'diachi'=>$request->input('diachi'),
            'sodienthoai'=>$request->input('sodienthoai'),
            'email'=>$request->input('email'),
            
        ]); 
       

        return redirect()->back()->with('successs', 'Bạn đã được thay đổi thành công.');
       
    
    }

    


    public function user_gioithieu_view(Request $request){
      

        
        return view("home_user.gioithieu");
    }
    
    public function kocosuatchieu(Request $request){
        
        

        

        if ($request->has('phimchon')) {
            $id_phim = $request->input('phimchon');
        
       
        
        
        $phim =Phim::find($id_phim);
        
        

        $phim_ = 'phim_' . Auth::user()->id;
        
     session()->put($phim_, $phim);    
   
        }

        return view("home_user.khongcosuatchieu");
    }


    public function datve_index(Request $request){
        $chongio_ = 'chongio_' . Auth::user()->id;

       
            
        
        $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
        
        
        $expires_at_ = 'expires_at_' . Auth::user()->id;
        if (Session::has($expires_at_)) {
            Session::forget($expires_at_);
        }
        $suatchieus_gio_ = 'suatchieus_gio_' . Auth::user()->id;
        if (Session::has($suatchieus_gio_)) {
            Session::forget($suatchieus_gio_);
        }
        $so_luong_ = 'so_luong_' . Auth::user()->id;
        if (Session::has($so_luong_)) {
            Session::forget($so_luong_);
        }
        $seatRows_ = 'seatRows_' . Auth::user()->id;
        if (Session::has($seatRows_)) {
            Session::forget($seatRows_);
        }
        $id_ghe_dat_ = 'id_ghe_dat_' . Auth::user()->id;
        if (Session::has($id_ghe_dat_)) {
            Session::forget($id_ghe_dat_);
        }

        if (Session::has($chongio_)) {
            foreach (session($chongio_) as $row){
                $id_suatchieu = $row['id'];
            }
            Session::forget($chongio_);
        }
      
        if (Session::has($ds_ghe_)) {
            foreach (session($ds_ghe_) as $row){
                Luutam::where('id_ghe', $row['id'])
                        ->where('id_suatchieu', $id_suatchieu)
                        ->delete();
            }
            Session::forget($ds_ghe_);
        }
       
        
        $phongchieu_ = 'phongchieu_' . Auth::user()->id;
         if (Session::has($phongchieu_)) {
            Session::forget($phongchieu_);
        }
        $giave_ = 'giave_' . Auth::user()->id;
        if (Session::has($giave_)) {
            Session::forget($giave_);
        }
        $tongTien_ = 'tongTien_' . Auth::user()->id;
        if (Session::has($tongTien_)) {
            Session::forget($tongTien_);
        }
        $chon_ngay_ = 'chon_ngay_' . Auth::user()->id;
        if (Session::has($chon_ngay_)) {
            Session::forget($chon_ngay_);
        }
        

       

        if ($request->has('phimchon')) {
            $id_phim = $request->input('phimchon');
        
       
        
        
        $phim =Phim::find($id_phim);
        
        /*$suatchieus_ngay = Suatchieu::select(DB::raw('DATE_FORMAT(thoigianchieu, "%Y-%m-%d") AS ngay'))
                    ->where('id_phim', $phim->id)
                    ->groupBy(DB::raw('DATE_FORMAT(thoigianchieu, "%Y-%m-%d")'))
                    ->get();*/
        
        $ngay_thang_nam = Suatchieu::where('id_phim', $phim->id)
                    ->selectRaw("DATE_FORMAT(thoigianchieu, '%Y-%m-%d') AS ngay")
                    ->groupBy('ngay')
                    ->get();

         
    
    $phim_ = 'phim_' .Auth::user()->id;
    
     session()->put( $phim_ , $phim);    
     $suatchieus_ngay_ = 'suatchieus_ngay_' . Auth::user()->id;
    session()->put($suatchieus_ngay_, $ngay_thang_nam);
        }

        return view("home_user.datve");
    }

    public function datve_ngaychieu_giochieu($ngaychieu){

        
        
        $suatchieus_gio_ = 'suatchieus_gio_' . Auth::user()->id;
        if (Session::has($suatchieus_gio_)) {
            Session::forget($suatchieus_gio_);
        }
        $so_luong_ = 'so_luong_' . Auth::user()->id;
        if (Session::has($so_luong_)) {
            Session::forget($so_luong_);
        }
        $seatRows_ = 'seatRows_' . Auth::user()->id;
        if (Session::has($seatRows_)) {
            Session::forget($seatRows_);
        }
        $id_ghe_dat_ = 'id_ghe_dat_' . Auth::user()->id;
        if (Session::has($id_ghe_dat_)) {
            Session::forget($id_ghe_dat_);
        }
        $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
       
        $chongio_ = 'chongio_' . Auth::user()->id;
        if(Session::has($chongio_) && Session::has($ds_ghe_)){
            foreach (session($chongio_) as $row){
                $id_suatchieu = $row['id'];
            }
            foreach (session($ds_ghe_) as $row){
                Luutam::where('id_ghe', $row['id'])
                        ->where('id_suatchieu', $id_suatchieu)
                        ->delete();
            }
        }
        if (Session::has($chongio_)) {
           
            Session::forget($chongio_);
        }
      
        if (Session::has($ds_ghe_)) {
           
            Session::forget($ds_ghe_);
        }
        $phongchieu_ = 'phongchieu_' . Auth::user()->id;
        if (Session::has($phongchieu_)) {
            Session::forget($phongchieu_);
        }
        $giave_ = 'giave_' . Auth::user()->id;
        if (Session::has($giave_)) {
            Session::forget($giave_);
        }
        $expires_at_ = 'expires_at_' . Auth::user()->id;
        if (Session::has($expires_at_)) {
            Session::forget($expires_at_);
        }
        $tongTien_ = 'tongTien_' . Auth::user()->id;
        if (Session::has($tongTien_)) {
            Session::forget($tongTien_);
        }

        if($ngaychieu){
        $chon_ngay_ = 'chon_ngay_' . Auth::user()->id;
        session()->put($chon_ngay_, $ngaychieu);
                // Ngày cần tìm giờ
        $date = Carbon::parse($ngaychieu);

        // Lọc suất chiếu theo ngày
        $phim_ = 'phim_' .Auth::user()->id;
        $phim = session($phim_);

        $suatchieus_gio = Suatchieu::whereDate('thoigianchieu', $date)->where('id_phim',  $phim['id'])->get();
        
        session()->put($suatchieus_gio_, $suatchieus_gio);
        return response()->json(['suatchieus_gio' => session($suatchieus_gio_)]);
        }
       
        return response()->json(['message' => 'Không có ngày chiếu được cung cấp.']);
    }
    

    public function datve_suatchieu(Request $request){
        $id_suatchieu=$request->input('id_suatchieu');
        
        $phongchieu_ = 'phongchieu_' . Auth::user()->id;
        $giave_ = 'giave_' . Auth::user()->id;
        $seatRows_ = 'seatRows_' . Auth::user()->id;
        $id_ghe_dat_ = 'id_ghe_dat_' . Auth::user()->id;
        $so_luong_ = 'so_luong_' . Auth::user()->id;
        if (Session::has($so_luong_)) {
            Session::forget($so_luong_);
        }
        
        if (Session::has($seatRows_)) {
            Session::forget($seatRows_);
        }

        
        if (Session::has($id_ghe_dat_)) {
            Session::forget($id_ghe_dat_);
        }
        $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
        if (Session::has($ds_ghe_)) {
            Session::forget($ds_ghe_);
        }
        if (Session::has($phongchieu_)) {
            Session::forget($phongchieu_);
        }
        if (Session::has($giave_)) {
            Session::forget($giave_);
        }
        $expires_at_ = 'expires_at_' . Auth::user()->id;
        if (Session::has($expires_at_)) {
            Session::forget($expires_at_);
        }
        $tongTien_ = 'tongTien_' . Auth::user()->id;
        if (Session::has($tongTien_)) {
            Session::forget($tongTien_);
        }
        $chongio_ = 'chongio_' . Auth::user()->id;
        if (Session::has($chongio_)) {
            Session::forget($chongio_);
        }

      
       
        // Kiểm tra xem ID suất chiếu có tồn tại hay không
        $suatchieu = Suatchieu::find($id_suatchieu);
        
        if ($suatchieu) {
              // Lấy thời gian chiếu
              $thoiGianChieu = Carbon::parse($suatchieu->thoigianchieu);
            // Lấy giờ từ thời gian chiếu
            $gioChieu = $thoiGianChieu->format('H:i');
              $chongio[] = ['id' => $suatchieu->id, 'giochieu' => $gioChieu];

              $chongio_ = 'chongio_' . Auth::user()->id;

            session()->put($chongio_, $chongio);
            // Nếu ID suất chiếu tồn tại, tiếp tục thực hiện các xử lý khác
            // Ví dụ:
            $phongchieu = Phongchieu::where('id',$suatchieu->id_phongchieu)->first();
            $ghevatly = Ghe::select('id', 'tenghe') // Chọn cả trường 'id' và 'tenghe'
                    ->where('id_phongchieu', $phongchieu->id)
                    ->get();

                $id_ghe_dat = Chongoi::select('id_ghe') // Chọn trường 'ghe_id' thay vì 'tenghe'
                    ->leftJoin('Suatchieu', 'chongoi.id_suatchieu', '=', 'Suatchieu.id')
                    ->leftJoin('ghe', 'chongoi.id_ghe', '=', 'ghe.id')
                    ->where('chongoi.trangthai', 'Đã đặt')
                    ->where('Suatchieu.id', $id_suatchieu)
                    ->where('Suatchieu.id_phongchieu', $phongchieu->id)
                    ->pluck('id_ghe') // Lấy trường 'ghe_id' thay vì 'tenghe'
                    ->toArray();

                $seatRows = [];
                // Lặp qua danh sách ghế và phân loại chúng theo hàng
                foreach ($ghevatly as $seat) {
                    $row = substr($seat->tenghe, 0, 1); // Lấy chữ cái đầu tiên của mã ghế (ví dụ: 'A' từ 'A01')
                    $seatRows[$row][] = ['id' => $seat->id, 'tenghe' => $seat->tenghe]; // Thêm ghế vào hàng tương ứng, bao gồm cả trường 'id'
                }
                $phongchieu1[] = ['id' => $phongchieu->id, 'tenphongchieu' => $phongchieu->tenphong];
               
                
                session()->put($phongchieu_,$phongchieu1);
                session()->put($giave_, $suatchieu->giave);
                session()->put($seatRows_, $seatRows);
                session()->put($id_ghe_dat_, $id_ghe_dat);
                return response()->json(['seatRows' => session($seatRows_),'giave_' => session($giave_),'id_ghe_dat_'=>session($id_ghe_dat_),'ds_ghe_'=>session($ds_ghe_),'phongchieu_'=>session($phongchieu_),'chongio_'=>session($chongio_)]);
               
                
        } else {
            // Nếu ID suất chiếu không tồn tại, xử lý theo ý định của bạn, ví dụ:
            return response()->json(['message' => 'Không có suất chiếu được cung cấp.']);
        }
       
    }

    public function luuGiaTriSoLuong(Request $request)
    {
        
            $soLuong = $request->so_luong;
            $so_luong_ = 'so_luong_' . Auth::user()->id;
            Session::put($so_luong_, $soLuong);
           
        $giave_ = 'giave_' . Auth::user()->id;
        $giaVe =session($giave_);

        // Tính tổng tiền
        $tongTien = $soLuong * $giaVe;

        // Lưu tổng tiền vào session
        $tongTien_ = 'tongTien_' . Auth::user()->id;
        Session::put($tongTien_, $tongTien);

        return response()->json(['tongtien' => session($tongTien_),'so_luong' => session($so_luong_)]);
    }

    public function datghe_maghe(Request $request)
{
   
        $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
        $expires_at_ = 'expires_at_' . Auth::user()->id;
        if (session()->has($ds_ghe_)) {
            // Nếu session đã tồn tại, gán giá trị của session cho biến $ds_ghe
            $ds_ghe = session($ds_ghe_);
        } else {
            // Nếu session chưa tồn tại, gán giá trị mảng rỗng cho biến $ds_ghe
            $ds_ghe = [];
        }

        if ($request->has('seat_id')) {
            $maghe = $request->input('seat_id');
           
            if (!session()->has($expires_at_)) {

                Session::put($expires_at_, time() + 300);
            }
           

            $chongio_ = 'chongio_' . Auth::user()->id;

            foreach (session($chongio_) as $row){
               $idsuatchieu = $row['id'];
            }

            $chongoi = Chongoi::where('id_suatchieu',$idsuatchieu)
            ->where('id_ghe',$maghe)
            ->get();
            if (!$chongoi->isEmpty()) {
                return response()->json(['mo' => 0]);
            } 

            $found = false;
            foreach ($ds_ghe as $gh) {
                if ($gh['id'] == $maghe  ) {
                    $found = true;
                    break;
                }
            }


            $so_luong_ = 'so_luong_' . Auth::user()->id;
            if (Session::has($so_luong_)) {
                $soluongve = session($so_luong_);
            }else{
                $soluongve = 0;
            }


            $ghes = ghe::find($maghe);
            if ($found || count($ds_ghe)>=$soluongve) {
                // Nếu ghế đã tồn tại, loại bỏ nó khỏi danh sách
                foreach ($ds_ghe as $key => $gh) {
                    if ($gh['id'] == $ghes->id) {
                        unset($ds_ghe[$key]);
                        break; // Thoát khỏi vòng lặp sau khi loại bỏ phần tử
                    }
                }
                

                

                if(count($ds_ghe)>=$soluongve && $soluongve > 0){
                    return response()->json(['message' => 'Bạn đã đặt ghế đủ số lượng vé!']);
                   
                }else if(count($ds_ghe)>=$soluongve && $soluongve == 0){
                    return response()->json(['message' => 'Bạn cần mua vé!']);
                }
            } else if(!$found && (count($ds_ghe)<session($so_luong_))) {
                // Nếu chưa tồn tại, thêm ghế vào danh sách
                $ds_ghe[] = ['id' => $ghes->id, 'tenghe' => $ghes->tenghe];
            }
            
            // Lưu danh sách ghế đã đặt vào session
           
            $ds_ghe = array_values($ds_ghe);
            session()->put($ds_ghe_, $ds_ghe);
            
           
            return response()->json(['ds_ghe' => $ds_ghe,'expires_at'=>session($expires_at_),'du_ghe' => count($ds_ghe),'so_luong'=> session($so_luong_)]);
        } else {
            if (Session::has($ds_ghe_)) {
                Session::forget($ds_ghe_);
            }
            return response()->json(['ds_ghe' => []]);
        }
    




} 



        public function thanhvien()
        {

           
          
           
            return view("home_user.thanhvien_cinema");
        }

        public function lichsu()
        {

            $hoadons = Hoadon::where('id_khachhang',Auth::user()->id)->get();

           
          
           
            return view("home_user.lichsumuave",['hoadons'=>$hoadons]);
        }
        public function xemchitiet(Request $request)
        {
            $id_hoadon = $request->input('id');

            $hoadons = Hoadon::where('id',$id_hoadon)->get();
            
            /*$chongoi = ChonGoi::where('id_thanhtoan', $id_hoadon)->with(['ghevatly', 'suatchieu'])->get();
            */
            $chongoi = ChonGoi::where('id_thanhtoan', $id_hoadon)
                        ->with('suatchieu')
                        ->get();
                        $ghes = [];

                        // Lặp qua từng chọn ghế để lấy thông tin ghế tương ứng
                        foreach ($chongoi as $chon) {
                            $gheId = $chon->id_ghe;
                            // Lấy thông tin ghế từ id_ghe
                            $ghe = ghe::find($gheId);
                            // Nếu không tìm thấy thông tin ghế, gán tên ghế là null
                            $tenGhe = $ghe ? $ghe->tenghe : null;
                    
                            // Thêm thông tin ghế vào mảng
                            $ghes[] = [
                                'ten_ghe' => $tenGhe,
                                // Các thông tin khác của chọn ghế
                                'trangthai' => $chon->trangthai,
                                // Và các thông tin khác bạn muốn bao gồm
                            ];
                        }
            $firstChongoi = $chongoi->first();
            $phimId = $firstChongoi->suatchieu->id_phim;
            $phim = Phim::find($phimId);
            
            $ngaychieu = $firstChongoi->suatchieu->thoigianchieu;
            $phongchieuId = $firstChongoi->suatchieu->id_phongchieu;
            $phongchieu = Phongchieu::find($phongchieuId);
            return response()->json(['ghes' => $ghes,'hoadon'=>$hoadons,'phim'=>$phim,'ngaychieu'=>$ngaychieu,'phongchieu'=>$phongchieu]);
        }
        public function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }

       
        public function momo_payment(Request $request){
          
           
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount =$_POST['total_momo'];
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/thongtindadat";
            $ipnUrl = "http://127.0.0.1:8000/thongtindadat";
            $extraData = "";




            $requestId = time() . "";
            $requestType = "payWithATM";
            //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            $so_luong_ = 'so_luong_' . Auth::user()->id;
            $insert = new Hoadon();
            $insert->phuongthucthanhtoan = "online";
            $insert->tongtien = $amount;
            $insert->ngaythanhtoan =  Carbon::now();
            $insert->trangthai = "Đã thanh toán";
            $insert->id_khachhang = Auth::user()->id;
            
            $insert->soluongvedamua = session($so_luong_);
            
            $insert->save();

            $largestInvoiceId = Hoadon::max('id');
            $mahoadon_ = 'mahoadon_' . Auth::user()->id;
            session()->put($mahoadon_,$largestInvoiceId);
            


            $user = User::find(Auth::user()->id) ;

            $so_luong_ = 'so_luong_' . Auth::user()->id;
            $tichdiemmoi = $user->tichdiem + (session($so_luong_)*90);
            $user->update([
                'tichdiem' => $tichdiemmoi
            ]);
            $chongio_ = 'chongio_' . Auth::user()->id;

            foreach (session($chongio_) as $row){
                $id_suatchieu = $row['id'];
            }
                
            
            $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
            foreach (session($ds_ghe_) as $row){
                
                $insert_chongoi = new chongoi();
               $insert_chongoi->id_ghe =$row['id'];
                $insert_chongoi->trangthai ="Đã đặt";
                $insert_chongoi->id_thanhtoan =$largestInvoiceId;
                $insert_chongoi->id_suatchieu =$id_suatchieu;
                $insert_chongoi->save();
            }
            
          
            
            return redirect()->to($jsonResult['payUrl']);
        }
        
        public function vnpay_payment(Request $request)
        {
            
            $total_pay = $request->input('total_vnpay');

           
            $code_card = rand(00,99999);
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/thongtindadat";
            $vnp_TmnCode = "HLTLM0R5";//Mã website tại VNPAY 
            $vnp_HashSecret = "IMBSEFFMJCSIHSMVXJNMYRSQXLGHOHOA"; //Chuỗi bí mật

            $vnp_TxnRef = $code_card; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán đơn hàng test";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = $total_pay * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            /*$vnp_ExpireDate = $_POST['txtexpire'];*/
            //Billing
           
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
                
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

           
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);

                if (isset($_POST['redirect'])) {
                   
                    $so_luong_ = 'so_luong_' . Auth::user()->id;
                    $insert = new Hoadon();
                    $insert->phuongthucthanhtoan = "online";
                    $insert->tongtien = $total_pay;
                    $insert->ngaythanhtoan =  Carbon::now();
                    $insert->trangthai = "Đã thanh toán";
                    $insert->id_khachhang = Auth::user()->id;
                    
                    $insert->soluongvedamua = session($so_luong_);
                    
                    $insert->save();

                    $largestInvoiceId = Hoadon::max('id');
                    $mahoadon_ = 'mahoadon_' . Auth::user()->id;
                    session()->put($mahoadon_,$largestInvoiceId);
                    


                    $user = User::find(Auth::user()->id) ;

                    $so_luong_ = 'so_luong_' . Auth::user()->id;
                    $tichdiemmoi = $user->tichdiem + (session($so_luong_)*90);
                    $user->update([
                        'tichdiem' => $tichdiemmoi
                    ]);
                    $chongio_ = 'chongio_' . Auth::user()->id;

                    foreach (session($chongio_) as $row){
                        $id_suatchieu = $row['id'];
                    }
                        
                    
                    $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
                    foreach (session($ds_ghe_) as $row){
                        Luutam::where('id_ghe', $row['id'])
                                ->where('id_suatchieu', $id_suatchieu)
                                ->delete();
                        $insert_chongoi = new chongoi();
                       $insert_chongoi->id_ghe =$row['id'];
                        $insert_chongoi->trangthai ="Đã đặt";
                        $insert_chongoi->id_thanhtoan =$largestInvoiceId;
                        $insert_chongoi->id_suatchieu =$id_suatchieu;
                        $insert_chongoi->save();
                    }
                    
                  
                   
                
                  
                    return redirect()->away($vnp_Url);
                   
                } else {
                    echo json_encode($returnData);
                }

                

   
        }

        

        public function  thanhtoan()
        {

            $chongio_ = 'chongio_' . Auth::user()->id;
            $idsuatchieu = null;
            
            // Lặp qua mỗi phần tử trong session để lấy idsuatchieu
            foreach (session($chongio_) as $row) {
                $idsuatchieu = $row['id'];
                // Nếu mục đích chỉ là lấy giá trị từ lần lặp cuối cùng, bạn có thể bỏ qua vòng lặp này
            }
            
            // Kiểm tra xem idsuatchieu đã được thiết lập từ session hay không
            if ($idsuatchieu !== null) {
                // Lấy tất cả các id ghe từ ds_ghe
                $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
                $ds_ghe = session($ds_ghe_);
                $ids_ghe = collect($ds_ghe)->pluck('id')->toArray();
            
                // Tìm bất kỳ ghế nào có trong ds_ghe đã được đặt trong bảng chongoi
                $chongoi = Chongoi::where('id_suatchieu', $idsuatchieu)
                                   ->whereIn('id_ghe', $ids_ghe)
                                   ->get();
                $luutam = Luutam::whereIn('id_ghe', $ids_ghe)->where('id_suatchieu', $idsuatchieu)->get();
               

                if ($luutam->isEmpty()) {
                    // Nếu cặp giá trị chưa tồn tại, tạo mới
                    foreach ($ds_ghe as $row) {
                        $newLuutam = new Luutam();
                        $newLuutam->id_ghe = $row['id'];
                        $newLuutam->id_suatchieu = $idsuatchieu;
                        $newLuutam->trangthai = "Lưu Tạm";
                        $newLuutam->save();
                    }
                }
                // Nếu có ghế được đặt, trả về một phản hồi JSON
                if (!$chongoi->isEmpty() || !$luutam->isEmpty()) {
                    return view('home_user.datve',['mo'=>0]);
                }
            }
            
            // Nếu không có ghế nào được đặt, trả về một phản hồi JSON
           


            return view('home_user.thanhtoan');
        }


        public function  nangcaphang()
        {
            $user = User::find(Auth::user()->id) ;

                    
            
            $user->update([
                'danhhieu' => "VIP"
            ]);

            return view('home_user.user_info');
        }
        

   

 
        public function thongtindadat()
        {
         
    
            return view('home_user.thongtin_hoadon');
  
        
          
        }

        public function guithongtindat_ve_email(Request $request)
        {
         
            $guimahoadon = $request->input('guimahoadon');

            $emails = Auth::user()->email;
            $tieudes = "Thông tin đã đặt vé xem phim";
            $phim_ = 'phim_' . Auth::user()->id;
            $tenphim= session($phim_)->tenphim;
            $diachi ="25 Hai Bà Trưng,Vĩnh Ninh, Thành Phố Huế , Thừa Thiên Huế";
            $chon_ngay_ = 'chon_ngay_' . Auth::user()->id;
            $formattedDateTime = \Carbon\Carbon::parse(session($chon_ngay_))->isoFormat('DD/MM/YYYY ');                    
            $dayOfWeek = \Carbon\Carbon::parse(session($chon_ngay_))->isoFormat('dddd');
            $thoigian = ''; // Khởi tạo $thoigian là một chuỗi rỗng
            $chongio_ = 'chongio_' . Auth::user()->id;
            foreach (session($chongio_) as $row){
                $thoigian .= $row['giochieu']; // Thực hiện nối chuỗi
            }
            
            // Tiếp tục nối các giá trị khác vào $thoigian nếu cần
            $thoigian .=" , ". $dayOfWeek ." , ". $formattedDateTime;  
            $so_luong_ = 'so_luong_' . Auth::user()->id;
            $soluong = session($so_luong_);
            
            $ds_ghe_ = 'ds_ghe_' . Auth::user()->id;
            $ds_ghe_array = [];
            foreach (session($ds_ghe_) as $row){
                $ds_ghe_array[] = $row['tenghe'];
            }
            sort($ds_ghe_array);
            $ds_ghe_sorted = implode(', ', $ds_ghe_array);
        Mail::to($emails)->send(new thongtindatve_email($tieudes,$guimahoadon,$tenphim,$diachi,$thoigian,$soluong,$ds_ghe_sorted));
        
            
        return redirect()->back();
  
        
          
        }
        

        
       
        public function search(Request $request)
        {
            $searchTerm = $request->input('search');
            $products = DB::table('phim')
                            ->where('tenphim', 'like', '%' . $searchTerm . '%')
                            ->orWhere('daodien', 'like', '%' . $searchTerm . '%')
                            ->orWhere('dienvienchinh', 'like', '%' . $searchTerm . '%')
                            ->get();
        
            return view('home_user.timkiem', compact('products'));
  
        
          
        }
        

       

        
}

   
    

   

    

