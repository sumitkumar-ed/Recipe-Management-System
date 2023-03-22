<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SentEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class EmailController extends Controller
{
    //

        public function user(){
            $data = User::where('role','!=','1')->get();
           
            return view ('other.mail',compact('data'));
        }

        public function EmailView($id){
            $data = User::where('uuid', $id)->first();
            return view('other.send_email_view',compact('data'));
        }

        public function StoreSingleEmail(Request $request,$id){
            $user = User::where('uuid', $id)->first();
            if ($user) {
                $details = array();
                $details['greeting']= $request->greeting;
                $details['body']= $request->body;
                $details['actiontext']= $request->actiontext;
                $details['actionurl']= $request->actionurl;
                $details['endtext']= $request->endtext;
        
                $user->notify(new SentEmailNotification($details));
            }
        
            return redirect('admin/user');
        }
        
    
}
