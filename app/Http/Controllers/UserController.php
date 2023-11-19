<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email = $request->get('email');
        $phonenumber = $request->get('phonenumber');
        if(User::where('email',$email)->orWhere('phonenumber',$phonenumber)->count() == 0){
            $user = new User;
            $user->name = $request->input('name');            
            $user->phonenumber = $request->input('phonenumber');            
            $user->email = $request->input('email');            
            $user->birthdate = $request->input('birthdate');            
            $user->password = Hash::make($request->input('password'));            
            $user->is_admin = $request->input('is_admin');            
            $user->status = $request->get('status')? true : false;            
            
            if($request->hasFile('photo_path')){
                $file = $request->file('photo_path');
                $filename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
                $user->photo_path = $filename;            
                $file->move('storage/user/',$filename);
            }

            $result = $user->save();            
            if($result){
                $request->session()->flash('user_create_form',true);
            }else{
                $request->session()->flash('user_create_form',false);
            }
        
        }else{
            $request->session()->flash('user_create_form',false);
        }

        return to_route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.pages.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');            
        $user->phonenumber = $request->input('phonenumber');            
        $user->email = $request->input('email');            
        $user->birthdate = $request->input('birthdate');            
        $user->password = $request->input('password') ? Hash::make($request->input('password')) : $user->password;            
        $user->is_admin = $request->input('is_admin');            
        $user->status = $request->get('status')? true : false;

        if($request->hasFile('photo_path')){
            $file = $request->file('photo_path');
            $filename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            File::delete('storage/user/'.$user->photo_path);
            $user->photo_path = $filename;            
            $file->move('storage/user',$filename);
        }

        try{
            $result = $user->save();            
            if($result){
                $request->session()->flash('user_edit_form',true);
}else{
                $request->session()->flash('user_edit_form',false);
            }
        }catch(Exception $ex){
            $request->session()->flash('user_edit_form',false);
        }

        return to_route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filename = User::find($id)->photo_path;
        if(User::destroy($id)){
            session()->flash('user_delete_form',true);
            File::delete('storage/social/'.$filename);
        }
        else{
            session()->flash('user_delete_form',false);
        }

        return to_route('admin.user.index');
    }

    // delete photo
    public function deletePhoto(int $id){
        $user = User::find($id);
        $filename = $user->photo_path;
        $user->photo_path = null;
        if($user->save()){
            session()->flash('user_deletePhoto_form',true);
            File::delete('storage/social/'.$filename);
        }
        else{
            session()->flash('user_deletePhoto_form',false);
        }

        return to_route('admin.user.index');
    } 
}
