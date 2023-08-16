<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Section;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function __construct(){
        $this->middleware('Initial');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = Section::get()->last();
        return view('admin.pages.sections.index',compact('section'));
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
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $type = $request->get('__type');
        $section = Section::find($id);
        if($type == 1){
            $section->headerFarsiTitle = $request->get('headerFarsiTitle');
            if($request->hasFile('headerPhotoPath')){
                if($section->headerPhotoPath)
                    File::delete('storage/section/'.$section->headerPhotoPath);
                $file = $request->file('headerPhotoPath');
                $filename = "HeaderSection-".Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
                $section->headerPhotoPath = $filename;
                $file->move('storage/section',$filename);
            }
            $section->headerSlogan = json_encode(['first'=>$request->get('headerSloganFirst'),'second'=>$request->get('headerSloganSecond'),'third'=>$request->get('headerSloganThird')]);
        }
        
        if($type == 2){
            if($request->hasFile('worldPhoto')){
                if($section->worldPhoto)
                    File::delete('storage/section/'.$section->worldPhoto);
                $file = $request->file('worldPhoto');
                $filename = "WorldSection-".Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
                $section->worldPhoto = $filename;
                $file->move('storage/section',$filename);
            }
            $section->worldContent = $request->get('worldContent');
        }

        if($type == 3){
            $section->trainingContent = $request->get('trainingContent');
        }

        if($type == 4){
            if($request->hasFile('biographyPhotoPath')){
                if($section->biographyPhotoPath)
                    File::delete('storage/section/'.$section->biographyPhotoPath);
                $file = $request->file('biographyPhotoPath');
                $filename = "BiographySection-".Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
                $section->biographyPhotoPath = $filename;
                $file->move('storage/section',$filename);
            }
            $section->biographyContent = $request->get('biographyContent');
        }

        if($type == 5){
            $section->socialNetworkContent = $request->get('socialNetworkContent');
        }

        if($section->save()){
            $request->session()->flash('section_edit_form',true);
            Log::create(['table_name'=>'section','record_id'=>$id,'user_id'=>1,'method'=>'update']);
        }else{
            $request->session()->flash('section_edit_form',false);
        }

        return to_route('admin.section.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $section = Section::get()->last();
        if($id == 1){
            File::delete('storage/section/'.$section->headerPhotoPath);
            $section->headerPhotoPath = null;
        }

        if($id == 2){
            File::delete('storage/section/'.$section->worldPhoto);
            $section->worldPhoto = null;
        }

        if($id == 4){
            File::delete('storage/section/'.$section->biographyPhotoPath);
            $section->biographyPhotoPath = null;
        }

        if($section->save()){
            session()->flash('section_delete_form',true);
            Log::create(['table_name'=>'section','record_id'=>$section->id,'user_id'=>1,'method'=>'delete']);
        }else{
            session()->flash('section_delete_form',false);
        }

        return to_route('admin.section.index');
    }
}
