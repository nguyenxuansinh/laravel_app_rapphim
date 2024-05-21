<?php

namespace App\Http\Controllers;

use App\Models\Chongoi;
use App\Models\ghe;
use App\Models\phongchieu;
use App\Models\suatchieu;
use Illuminate\Http\Request;

class PhongchieuController extends Controller
{
    public function index()
    {
        $phongchieus = phongchieu::all();
        return view('home_admin.phongchieu')->with('phongchieus',$phongchieus);
    }

    public function insert_phongchieu(Request $request)
    {
        $insert = new phongchieu();
        $insert->tenphong = $request->input('tenphong');
        $insert->save();
        return redirect()->route('phongchieu.index');
    }

    public function edit($id)
    {
        $phongchieus = phongchieu::find($id);
        return view('admin_phongchieu.edit')->with('phongchieus',$phongchieus);
    }
    public function update(Request $request, string $id)
    {
        $phongchieus = phongchieu::find($id);


        $phongchieus->update([
            'tenphong' => $request->input('tenphong'),
            

        ]);

        
        
        return redirect()->route('phongchieu.index');
    }

    public function delete($id)
    {
        $phongchieu = Phongchieu::findOrFail($id);
        $ghes = Ghe::where('id_phongchieu', $phongchieu->id)->get();
        $suatchieus = suatchieu::where('id_phongchieu', $phongchieu->id)->get();
       
        // Xóa tất cả các ghế thuộc về phòng chiếu này
        foreach ($ghes as $ghe) {
            $ghe->delete();
        }

        foreach ($suatchieus as $suatchieu) {
            $chongois = Chongoi::where('id_suatchieu', $suatchieu->id)->get();
            foreach ($chongois as $chongoi) {
                $chongoi->delete();
            }
           $suatchieu->delete();
        }
        $phongchieu->delete();
       
        

        return redirect()->route("phongchieu.index");
    }

    
}
