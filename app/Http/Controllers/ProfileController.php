<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('Authenticated');
        $this->middleware('NoPassword')->except(['password','password_action']);
    }
    public function index(){
        return view('pages.profile.index');
    }
    public function changePassword(){
        return view('pages.profile.change-password');
    }

    public function changePassword_action(Request $request){
        $user = User::find(session()->get('user_id'));
        if(Hash::check($request->get('current_password'),$user->password)){
            $user->password = Hash::make($request->get('password'));

            if($user->save())
                return to_route('home');
        }
        
        return back();
    }

    public function newPassword(){
        return view('pages.profile.new-password');
    }
    public function password(){
        $user = User::find(request()->session()->get('user_id'));
        if($user->password)
            return to_route('home');
        return view('pages.profile.password');
    }
    public function password_action(Request $request){
        $user = User::find(session()->get('user_id'));
        $user->password = Hash::make($request->get('password'));
        if($user->save())
            return to_route('profile.index');
        
        return back();
    }
}
