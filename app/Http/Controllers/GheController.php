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
