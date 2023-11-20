<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('Initial');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::get()->last();
        return view('admin.pages.settings.base.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $result = Setting::where('id',$id)->update($request->except(['_method','_token']));
        if($result){
            session()->flash('setting_edit_form',true);
        }
        else{
            session()->flash('setting_edit_form',false);
        }

        return to_route('admin.setting.index');
    }

    // update site title
    public function editSiteTitle(Request $request, int $id)
    {
        $result = Setting::where('id',$id)->update($request->except(['_method','_token']));
        if($result){
            session()->flash('setting_siteTitle_edit_form',true);
        }
        else{
            session()->flash('setting_siteTitle_edit_form',false);
        }

        return to_route('admin.setting.index');
    }

    // update site icon
    public function editSiteIcon(Request $request, int $id)
    {
        $setting = Setting::find($id);
        $oldFilename = $setting->siteIcon;
        if($request->hasFile('siteIcon')){
            File::delete('storage/setting/'.$oldFilename);
            $file = $request->file('siteIcon');
            $newFilename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            $setting->siteIcon = $newFilename;
            $file->move('storage/setting/',$newFilename);
        }

        if($setting->save()){
            session()->flash('setting_siteIcon_edit_form',true);
        }else{
            session()->flash('setting_siteIcon_edit_form',false);
        }

        return to_route('admin.setting.index');

    }

    // update site logo
    public function editSiteLogo(Request $request, int $id)
    {
        $setting = Setting::find($id);
        $oldFilename = $setting->siteLogo;
        if($request->hasFile('siteLogo')){
            File::delete('storage/setting/'.$oldFilename);
            $file = $request->file('siteLogo');
            $newFilename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            $setting->siteLogo = $newFilename;
            $file->move('storage/setting/',$newFilename);
        }

        if($setting->save()){
            session()->flash('setting_siteLogo_edit_form',true);
        }else{
            session()->flash('setting_siteLogo_edit_form',false);
        }
        
        return to_route('admin.setting.index');
    }

    // update logo title
    public function editLogoTitle(Request $request, int $id)
    {
        $result = Setting::where('id',$id)->update($request->except(['_method','_token']));
        if($result){
            session()->flash('setting_logoTitle_edit_form',true);
        }
        else{
            session()->flash('setting_logoTitle_edit_form',false);
        }

        return to_route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $setting = Setting::find(1);
        if($id == 1){
            File::delete('storage/setting/'.$setting->siteIcon);
            $setting->siteIcon = null;
        }
        else if($id == 2){
            File::delete('storage/setting/'.$setting->siteLogo);
            $setting->siteLogo = null;
        }
    
        $setting->save();
        return to_route('admin.setting.index');
    }
    
}
