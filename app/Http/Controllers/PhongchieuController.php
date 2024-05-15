<?php

namespace App\Http\Controllers;

use App\Models\phongchieu;
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

        $phongchieus = phongchieu::find($id);
        $phongchieus->delete();

        return redirect()->route("phongchieu.index");
    }

    
}
