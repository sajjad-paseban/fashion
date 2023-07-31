<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Media;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::all();
        return view('admin.pages.media.index',compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $media = new Media;
        $file = $request->file('path');
        $type = (str_contains($file->getMimeType(),'image')) ? 'Image' : 'Video';
        $filename = $type.'-'.Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
        $media->path = $filename;

        if($media->save() && $file->move('storage/media/',$filename)){
            $request->session()->flash('media_create_form',true);
            Log::create(['table_name'=>'media','record_id'=>$media->id,'user_id'=>1,'method'=>'create']);
            return response()->json('File uploaded successfully', 200);
        }else{
            $request->session()->flash('media_create_form',false);
            return response()->json('No file found', 400);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filename = Media::find($id)->path;
        if(Media::destroy($id)){
            session()->flash('media_delete_form',true);
            Log::create(['table_name'=>'media','record_id'=>$id,'user_id'=>1,'method'=>'delete']);
            File::delete('storage/media/'.$filename);
        }
        else{
            session()->flash('media_delete_form',false);
        }

        return to_route('admin.media.index');
    }
}
