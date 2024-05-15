<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = banner::all();
        return view('home_admin.banner')->with('banners',$banners);
    }
    public function insert_banner(Request $request){
       
        
        $insert = new banner();
       

        $anh_banners = $request->file('anh_banner');
       



        if($anh_banners!=null){
            $generatedImageName = 'image' . time() . '-'
            . $request->anh_banner->extension();
            $anh_banners->move(public_path('image_banner'), $generatedImageName);
            $insert->anh_banner = $generatedImageName;
        }


        $insert->save();
        return redirect()->route('banner.index');
    }
    
    public function edit($id)
    {
        $banners = banner::find($id);
        return view('admin_banner.edit')->with('banners',$banners);
    }

    public function update(Request $request, string $id)
    {
        $banners = banner::find($id);

      


        $anh_banners = $request->file('anhbanner');
        /*$anh_phim->move(public_path('image_phims'),$anh_phim->getClientOriginalName());
        $anhphim_name = $anh_phim->getClientOriginalName();*/



        if($anh_banners!=null){
            $generatedImageName = 'image' . time() . '-'
            . $request->anhbanner->extension();
            $anh_banners->move(public_path('image_banner'), $generatedImageName);

            $banners->update([
                'anh_banner' => $generatedImageName
            ]);
            
        }

       

        
        
        return redirect()->route('banner.index');
    }

    public function delete($id)
    {

        $banners = banner::find($id);
        $banners->delete();

        return redirect()->route("banner.index");
    }
}
