<?php

namespace App\Http\Controllers;

use App\Mail\CustomEmail;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    
    public function admin_index(Request $request){
        $feedbacks = Feedback::all();
       
        return view('home_admin.feedback', ['feedbacks' => $feedbacks]);
        
    }

    public function feedback(Request $request){
      
        $user_feedback = Feedback::create([
            'name'=>$request->hoten,
            'email' => $request->email,
            'message' => $request->mota,
            'trangthai'=> 'chưa trả lời',
            
        ]);
        return redirect()->back();
    }
    public function edit($id){
      
        $user_feedback = Feedback::find($id);
           
        return view('admin_feedback.edit')->with('user_feedback',$user_feedback);
    }

    public function update(Request $request,$id){
      
        $validatedData = $request->validate([
            'email' => 'required|email',
            'tieude' => 'required',
            'noidung' => 'required',
        ]);
    
        $emails = $validatedData['email'];
        $tieudes = $validatedData['tieude'];
        $noidungs = $validatedData['noidung'];
    
        
        Mail::to($emails)->send(new CustomEmail($tieudes, $noidungs));
        
        $user_feedback = Feedback::find($id);

        $user_feedback->update(['trangthai'=>'đã trả lời']);
        return redirect()->route('feedback.index');
    }

    public function delete_all(){
      
        Feedback::where('trangthai', 'Đã trả lời')->delete();
        
        return redirect()->route('feedback.index');
    }

    
    
    
}
