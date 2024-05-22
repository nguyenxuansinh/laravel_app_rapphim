<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Chongoi;
use App\Models\Hoadon;
use App\Models\phim;
use App\Models\phongchieu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function login()
    {
        return view("Admin.login");
    }

    public function checklogin(Request $request)
    {
        
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'phanquyen'=>1])) {
           
            return redirect()->route('admin.index');
        } else {
            abort(403, 'Unauthorized action.');
           
        }
    }
    public function logout(Request $request)
    {
        
        
        Auth::logout();
        
        return redirect()->route('admin.login');
    }
    

////////////////////////phim
    public function index()
    {
        $tongDoanhThu = Hoadon::sum('tongtien');
        $hoadons = Hoadon::all();
        $doanhThuTheoThang = Hoadon::select(
            DB::raw('MONTH(ngaythanhtoan) as thang'),
            DB::raw('YEAR(ngaythanhtoan) as nam'),
            DB::raw('SUM(tongtien) as tongDoanhThu')
        )
        ->groupBy('nam', 'thang')
        ->get();
        $doanhthutheonam = Hoadon::select(
            DB::raw('YEAR(ngaythanhtoan) as nam'),
            DB::raw('SUM(tongtien) as tongDoanhThu')
        )
        ->groupBy(DB::raw('YEAR(ngaythanhtoan)'))
        ->get();
        $results = DB::table('hoadon AS hd')
                ->join('chongoi AS cg', 'hd.id', '=', 'cg.id_thanhtoan')
                ->join('suatchieu AS sc', 'cg.id_suatchieu', '=', 'sc.id')
                ->join('phim AS m', 'sc.id_phim', '=', 'm.id')
                ->select('m.tenphim', DB::raw('sc.giave * count(cg.id) as tong_doanh_thu'))
                ->where('m.trangthai', 'đang chiếu')
                ->groupBy('m.tenphim', 'sc.giave')
                ->get();
        return view("home_admin.index",['hoadons'=>$hoadons,'doanhThuTheoThang'=>$doanhThuTheoThang,'tongDoanhThu' => $tongDoanhThu,'results'=>$results,'doanhThuTheoNam'=>$doanhthutheonam]);
    }
    public function thongtinkhachhang_index()
    {
        $users = User::where('phanquyen', 0)->get();
        return view("home_admin.thongtinkhachhang",['users'=>$users]);
    }
   
    public function doanh_thu(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        
       if( $startDate!=null && $endDate!=null && $startDate <=$endDate){
        $tongDoanhThu = Hoadon::whereBetween('ngaythanhtoan', [$startDate, $endDate])->sum('tongtien');
        $doanhThu = Hoadon::whereBetween('ngaythanhtoan', [$startDate, $endDate])->get();
       }else{
            $tongDoanhThu = Hoadon::sum('tongtien');
         $doanhThu = Hoadon::all(); 
       }
       

        $doanhThuTheoThang = Hoadon::select(
            DB::raw('MONTH(ngaythanhtoan) as thang'),
            DB::raw('SUM(tongtien) as tongDoanhThu')
        )
        ->groupBy(DB::raw('MONTH(ngaythanhtoan)'))
        ->get();
        $doanhthutheonam = Hoadon::select(
            DB::raw('YEAR(ngaythanhtoan) as nam'),
            DB::raw('SUM(tongtien) as tongDoanhThu')
        )
        ->groupBy(DB::raw('YEAR(ngaythanhtoan)'))
        ->get();
        $results = DB::table('hoadon AS hd')
        ->join('chongoi AS cg', 'hd.id', '=', 'cg.id_thanhtoan')
        ->join('suatchieu AS sc', 'cg.id_suatchieu', '=', 'sc.id')
        ->join('phim AS m', 'sc.id_phim', '=', 'm.id')
        ->select('m.tenphim', DB::raw('sc.giave * count(cg.id) as tong_doanh_thu'))
        ->where('m.trangthai', 'đang chiếu')
        ->groupBy('m.tenphim', 'sc.giave')
        ->get();
        return view("home_admin.index",['hoadons'=>$doanhThu,'doanhThuTheoThang'=>$doanhThuTheoThang ,'tongDoanhThu' => $tongDoanhThu,'doanhThuTheoNam'=>$doanhthutheonam,'results'=>$results]);
    }
    

    public function hoadon_detail($id)
    {
        $hoadons = Hoadon::where('id',$id)->get();
        $chongoi = Chongoi::where('id_thanhtoan', $id)->with(['ghevatly', 'suatchieu'])->get();
       
        $firstChongoi = $chongoi->first();
        $phimId = $firstChongoi->suatchieu->id_phim;
        $phim = Phim::find($phimId);
        
        $ngaychieu = $firstChongoi->suatchieu->thoigianchieu;
        $phongchieuId = $firstChongoi->suatchieu->id_phongchieu;
        $phongchieu = Phongchieu::find($phongchieuId);

        return view("home_admin.hoadon_detail",['chongoi' => $chongoi,'hoadon'=>$hoadons,'phim'=>$phim,'ngaychieu'=>$ngaychieu,'phongchieu'=>$phongchieu]);
    }

    

    public function create_product()
    {
        return view("admin_product.create");
    }

    public function post_add_product ()
    {
        return view("admin_product.create");
    }


////////////////////phong chieu
    public function create_phongchieu()
    {
        return view("admin_phongchieu.create");
    }

////////////////////ghe


    public function create_ghe()
    {
        $phongchieus = phongchieu::all();
        return view("admin_ghe.create",['phongchieus'=>$phongchieus]);
    }

/////////////////// suat chieu


    public function create_suatchieu()
    {
        $phims = phim::all();
        $phongchieus = phongchieu::all();
        return view("admin_suatchieu.create",['phongchieus'=>$phongchieus,'phims'=>$phims]);
    }

////////////////// banner
    public function create_banner()
    {
        $banners = banner::all();
        
        return view("admin_banner.create",['banners'=>$banners]);
    }

}
