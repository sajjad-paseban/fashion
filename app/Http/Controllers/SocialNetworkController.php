<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\SocialNetwork;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $networks = SocialNetwork::all();
        return view('admin.pages.settings.social-network.index',compact('networks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.settings.social-network.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $network = new SocialNetwork;

        $file = $request->file('icon_path');
        $filename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
        $network->name = $request->get('name');
        $network->link = $request->get('link');
        $network->icon_path = $filename;
        $network->status = $request->get('status')? true : false;
        if($network->save()){
            $file->move('storage/social/',$filename);
            $request->session()->flash('social_create_form',true);
            return to_route('admin.social.index');
        }

        $request->session()->flash('social_create_form',false);
        return to_route('admin.social.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(SocialNetwork $socialNetwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $network = SocialNetwork::find($id);
        return view('admin.pages.settings.social-network.edit',compact('network'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $network = SocialNetwork::find($id);
        $oldFileName = $network->icon_path;
        $network->name = $request->get('name');
        $network->link = $request->get('link');
        $network->status = $request->get('status')? true : false;
        if($request->hasFile('icon_path')){
            $file = $request->file('icon_path');
            $newFileName = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            $network->icon_path = $newFileName;
            $file->move('storage/social/',$newFileName);
            File::delete('storage/social/'.$oldFileName);
        }

        if($network->save()){
            $request->session()->flash('social_edit_form',true);
            return to_route('admin.social.index');
        }

        $request->session()->flash('social_edit_form',false);
        return to_route('admin.social.edit',$id);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $filename = SocialNetwork::find($id)->icon_path;
        if(SocialNetwork::destroy($id)){
            session()->flash('social_delete_form',true);
            File::delete('storage/social/'.$filename);
        }
        else{
            session()->flash('social_delete_form',false);
        }

        return to_route('admin.social.index');
    }
}
