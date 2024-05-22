<?php

namespace App\Http\Controllers;

use App\Models\Chongoi;
use App\Models\phim;
use App\Models\suatchieu;
use Illuminate\Http\Request;

class PhimController extends Controller
{

    public function index()
    {
        $phims = phim::all();
        return view('home_admin.product')->with('phims',$phims);
    }


    public function insert_phim(Request $request){
        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);


        
        $insert = new phim();
        $insert->tenphim = $request->input('tenphim');
        $insert->theloai = $request->input('theloai');
        $insert->daodien = $request->input('daodien');
        $insert->dienvienchinh = $request->input('dienvienchinh');
        $insert->ngayphathanh = $request->input('ngayphathanh');
        $insert->thoiluong = $request->input('thoiluong');
        $insert->mota = $request->input('mota');
        
        
        $insert->trangthai = $request->input('trangthaiphim');


        $videos = $request->file('video');
        /*$videos->move(public_path('videos'),$videos->getClientOriginalName());
        $video_name = $videos->getClientOriginalName();*/

        if($videos != null){
            $generatedVideoName = 'image' . time() . '-'
            . $request->video->extension();
            $videos->move(public_path('videos'), $generatedVideoName);
            $insert->video = $generatedVideoName;
        }
        


        $anh_phim = $request->file('anhphim');
        /*$anh_phim->move(public_path('image_phims'),$anh_phim->getClientOriginalName());
        $anhphim_name = $anh_phim->getClientOriginalName();*/



        if($anh_phim!=null){
            $generatedImageName = 'image' . time() . '-'
            . $request->anhphim->extension();
            $anh_phim->move(public_path('image_phims'), $generatedImageName);
            $insert->hinhanh = $generatedImageName;
        }


        $insert->save();
        return redirect()->route('phim.index');
    }


    public function edit($id)
    {
        $phims = phim::find($id);
        return view('admin_product.edit')->with('phims',$phims);
    }

    public function update(Request $request, string $id)
    {
        $phims = phim::find($id);

        $videos = $request->file('video');
        /*$videos->move(public_path('videos'),$videos->getClientOriginalName());
        $video_name = $videos->getClientOriginalName();*/

        if($videos != null){
            $generatedVideoName = 'image' . time() . '-'
            . $request->video->extension();
            $videos->move(public_path('videos'), $generatedVideoName);
            $phims->update([
                'video'=>$generatedVideoName
            ]);
        }
        


        $anh_phim = $request->file('anhphim');
        /*$anh_phim->move(public_path('image_phims'),$anh_phim->getClientOriginalName());
        $anhphim_name = $anh_phim->getClientOriginalName();*/



        if($anh_phim!=null){
            $generatedImageName = 'image' . time() . '-'
            . $request->anhphim->extension();
            $anh_phim->move(public_path('image_phims'), $generatedImageName);

            $phims->update([
                'hinhanh' => $generatedImageName
            ]);
            
        }

        $phims->update([
            'tenphim' => $request->input('tenphim'),
            'theloai'=> $request->input('theloai'),
            'daodien'=> $request->input('daodien'),
            'dienvienchinh'=> $request->input('dienvienchinh'),
            'ngayphathanh'=> $request->input('ngayphathanh'),
            'thoiluong'=> $request->input('thoiluong'),
            'mota'=> $request->input('mota'),
            'trangthai'=> $request->input('trangthaiphim'),

        ]);

        
        
        return redirect()->route('phim.index');
    }

    public function delete($id)
    {

        $phim = phim::find($id);
        $suatchieus = suatchieu::where('id_phim', $phim->id)->get();
        foreach ($suatchieus as $suatchieu) {
            $chongois = Chongoi::where('id_suatchieu', $suatchieu->id)->get();
            foreach ($chongois as $chongoi) {
                $chongoi->delete();
            }
           $suatchieu->delete();
        }


        $phim->delete();

        return redirect()->route("phim.index");
    }

}
