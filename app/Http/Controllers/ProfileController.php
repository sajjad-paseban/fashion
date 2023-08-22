<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use File;
use Hash;
use Morilog\Jalali\Jalalian;
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
    public function profile_action(Request $request, int $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->phonenumber = $request->phonenumber;
        $user->email = $request->email;
        $date = explode('/',$request->birthdate);
        $carbonDate = new Jalalian($date[0],$date[1],$date[2]);
        $user->birthdate = $carbonDate->toCarbon()->format('Y-m-d');
        if($request->hasFile('photo_path')){
            if($user->photo_path){
                File::delete('storage/user/'.$user->photo_path);
            }

            $file = $request->file('photo_path');
            $filename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            $user->photo_path = $filename;            
            $file->move('storage/user',$filename);
        }

        $result = $user->save();            
        
        if($result){
            $request->session()->flash('profile_edit_form',true);
        }else{
            $request->session()->flash('profile_edit_form',false);
        }

        return back();
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

    public function delete_photo(int $id){
        $user = User::find($id);
        File::delete('storage/user/'.$user->photo_path);
        $user->photo_path = null;

        $result = $user->save();            
        if($result){
            session()->flash('photo_delete_form',true);
        }else{
            session()->flash('photo_delete_form',false);
        }

        return back();        
    }
}
