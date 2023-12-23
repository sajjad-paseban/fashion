<?php

namespace App\Http\Controllers;

use App\Models\PasswordForgotten;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class PasswordForgottenController extends Controller
{
    public function index(){
        return view('pages.password-forgotten');
    }

    public function sendPasswordForgottenEmail(Request $request){
        
        $email = $request->email;
        
        $user = User::where('email',$email);
        
        if($user->count() > 0){
            
            $uuid = uuid_create();
            
            $id = PasswordForgotten::create([
                'uuid' => $uuid,
                'user_id' => $user->get()->last()->id,
                'status' => false,
                'second_period' => 1200
            ])->id;

            $msg = '';
            $msg .= "برای تغییر گذرواژه بر روی لینک زیر کلیک نمایید:";
            $msg .= "\n";
            $msg .= "https://monagolchin.ir/check-password-forgotten-email?uuid=".$uuid."&id=".$id;

            Mail::raw($msg, function ($message) use($email) {
                $message->subject('طراحی مد با منا - فراموشی گذرواژه')->to($email);
            });
            
            $request->session()->flash('password-forgotten',true);
        }else{
            $request->session()->flash('password-forgotten',false);
        }
        
        return to_route('login');
    }
    public function checkPasswordForgottenEmail(Request $request){
        $check = PasswordForgotten::where('uuid',$request->uuid)->where('id',$request->id)->get()->last();
        $diffInSecond =  Carbon::parse($check->created_at)->addSeconds($check->second_period)->diffInSeconds(now());       
        return $diffInSecond;
        if($check && $check->status == false && $diffInSecond > 0){
            $data = [
                'user_id' => $check->user_id,
                'id' => $check->id,
                'uuid' => $check->uuid
            ];
            return view('pages.new-password', compact('data'));
        }else{
            return to_route('login');
        }
    }

}
