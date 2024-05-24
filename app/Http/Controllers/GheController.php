<?php

namespace App\Http\Controllers;

use App\Models\ghe;
use App\Models\phongchieu;
use Illuminate\Http\Request;

class GheController extends Controller
{
    public function index()
    {
        $ghes = ghe::all();
       
        return view('home_admin.ghe', ['ghes' => $ghes]);
    }
    public function insert_ghe(Request $request)
    {
        $insert = new ghe();
        $insert->tenghe = $request->input('tenghe');
        $insert->trangthai = $request->input('trangthai');
        $insert->id_phongchieu = $request->input('ghe_phongchieu');
        $exists = ghe::where('id_phongchieu', $insert->id_phongchieu)->where('tenghe', $insert->tenghe)->exists();
        if ($exists) {
            
            return redirect()->back()->withErrors(['tenghe' => 'Tên ghế trong cùng một phòng đã tồn tại.']);
        }
        $insert->save();
        return redirect()->route('ghe.index');
    }

    public function edit($id)
    {
        $ghes = ghe::find($id);
        $phongchieus = phongchieu::all();
        return view('admin_ghe.edit',['ghes'=>$ghes,'phongchieus'=>$phongchieus]);
    }

    public function update(Request $request, string $id)
    {
        $ghes = ghe::find($id);

        $tenghegmoi = $request->input('tenghe');
        $tenphongmoi = $request->input('ghe_phongchieu');
        if($tenghegmoi !== $ghes->tenghe && $tenphongmoi !== $ghes->id_phongchieu){
            $exists = ghe::where('id_phongchieu', $tenphongmoi)->where('tenghe', $tenghegmoi)->exists();
            if ($exists) {
                
                return redirect()->back()->withErrors(['tenghe' => 'Tên ghế trong cùng một phòng đã tồn tại.']);
            }
        }

        $ghes->update([
            'tenghe' => $request->input('tenghe'),
            'trangthai' => $request->input('trangthai'),
            'id_phongchieu' => $request->input('ghe_phongchieu'),
        ]);

        
        
        return redirect()->route('ghe.index');
    }

    public function delete($id)
    {

        $ghes = ghe::find($id);
        $ghes->delete();

        return redirect()->route("ghe.index");
    }

}
