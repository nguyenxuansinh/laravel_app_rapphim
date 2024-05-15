<?php

namespace App\Http\Controllers;

use App\Models\phim;
use App\Models\phongchieu;
use App\Models\suatchieu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuatchieuController extends Controller
{
    public function index()
    {
        $suatchieus = suatchieu::all();
       
        return view('home_admin.suatchieu', ['suatchieus' => $suatchieus]);
    }

    public function insert_suatchieu(Request $request)
    {
         // Lấy dữ liệu từ request
    $thoiGianChieuMoi = $request->input('thoigianchieu');
    $thoiGianKetThucMoi = $request->input('thoigianketthuc');
    $phongChieu = $request->input('suat_phongchieu');
    $phim = $request->input('suat_phim');
    $giave = $request->input('giave');
    $thoiGianChieuMoi = Carbon::parse($thoiGianChieuMoi);
    $thoiGianKetThucMoi = Carbon::parse($thoiGianKetThucMoi);

    // kiểmtra thoi gian chieu 
    if ($thoiGianKetThucMoi->lessThan($thoiGianChieuMoi)) {
        return redirect()->back()->withInput()->with('error', 'Thời gian chiếu hoặc kết thúc sai.');
    }


    // Kiểm tra xem đã tồn tại suất chiếu trong cùng một phòng, cùng một ngày không
    $existingSuatChieu = SuatChieu::where('id_phongchieu', $phongChieu)
        ->whereDate('thoigianchieu', $thoiGianChieuMoi->toDateString())
        ->exists();
    
    if ($existingSuatChieu) {
        // Nếu đã tồn tại suất chiếu, kiểm tra thời gian chiếu và kết thúc có giao nhau không
        $giaoNhau = SuatChieu::where('id_phongchieu', $phongChieu)
        ->whereDate('thoigianchieu', $thoiGianChieuMoi->toDateString())
        ->where(function ($query) use ($thoiGianChieuMoi, $thoiGianKetThucMoi) {
            $query->where(function ($q) use ($thoiGianChieuMoi, $thoiGianKetThucMoi) {
                $q->where('thoigianchieu', '>=', $thoiGianChieuMoi)
                    ->where('thoigianchieu', '<', $thoiGianKetThucMoi);
            })
            ->orWhere(function ($q) use ($thoiGianChieuMoi, $thoiGianKetThucMoi) {
                $q->where('thoigianketthuc', '>', $thoiGianChieuMoi)
                    ->where('thoigianketthuc', '<=', $thoiGianKetThucMoi);
            })
            ->orWhere(function ($q) use ($thoiGianChieuMoi, $thoiGianKetThucMoi) {
                $q->where('thoigianchieu', '<', $thoiGianChieuMoi)
                    ->where('thoigianketthuc', '>', $thoiGianKetThucMoi);
            });
        })
        ->exists();

        if ($giaoNhau) {
            return redirect()->back()->withInput()->with('error', 'Thời gian chiếu hoặc kết thúc trùng lặp với suất chiếu khác.');
        }
    }

    // Thêm suất chiếu mới nếu không có thời gian giao nhau
    $insert = new SuatChieu();
    $insert->id_phongchieu = $phongChieu;
    $insert->thoigianchieu = $thoiGianChieuMoi;
    $insert->thoigianketthuc = $thoiGianKetThucMoi;
    $insert->id_phim = $phim;
    $insert->giave = $giave;
    $insert->save();

    return redirect()->route('suatchieu.index');

    }
    public function edit($id)
    {
        $suatchieus = suatchieu::find($id);
        $phongchieus = phongchieu::all();
        $phims = phim::all();
        return view('admin_suatchieu.edit',['phims'=>$phims,'phongchieus'=>$phongchieus,'suatchieus'=>$suatchieus]);
    }

    public function update(Request $request, string $id)
    {
        $suatchieus = suatchieu::find($id);

        $existingSuatChieu = SuatChieu::where('id_phongchieu', $request->input('suat_phongchieu'))
                                   ->where('thoigianchieu', $request->input('thoigianchieu'))
                                   ->where('id_phim', $request->input('suat_phim'))
                                   ->where('giave', $request->input('giave'))
                                   ->exists();
        if($existingSuatChieu){
            return redirect()->back()->withInput()->with('error', 'Suất chiếu đã tồn tại.');
    
        }

       

        
        $suatchieus->update([
            'id_phongchieu' => $request->input('suat_phongchieu'),
            'thoigianchieu' => $request->input('thoigianchieu'),
            'id_phim' => $request->input('suat_phim'),
            'thoigianketthuc' => $request->input('thoigianketthuc'),
            'giave'=>$request->input('giave'),
        ]);

        
        
        return redirect()->route('suatchieu.index');
    }

    public function delete($id)
    {

        $suatchieus = suatchieu::find($id);
        $suatchieus->delete();

        return redirect()->route("suatchieu.index");
    }
    
}
