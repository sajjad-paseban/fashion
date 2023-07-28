<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Page;
use App\Models\Seo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['status'=> $request->get('status')? true : false,'user_id'=>1]);
        $result = Page::create($request->except(['_method','_token']));
        if($result){
            $seo = new Seo;
            $seo->title = $request->get('seoTitle');
            $seo->slug = $request->get('slug');
            $seo->keywords = $request->get('keywords');
            $seo->description = $request->get('description');
            $seo->type = 2;
            $seo->owner_id = $result->id;
            $seo->save();
            $request->session()->flash('page_create_form',true);
            Log::create(['table_name'=>'page','record_id'=>$result->id,'user_id'=>1,'method'=>'create']);
        }else{
            $request->session()->flash('page_create_form',false);
        }

        return to_route('admin.page.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $page = Page::find($id);
        return view('admin.pages.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->merge(['status'=> $request->get('status')? true : false,'user_id'=>1]);
        $result = Page::where('id',$id)->update($request->only(['title','status','content','user_id']));

        if($result){
            $seo = Seo::where('owner_id',$id)->where('type',2)->first();
            $seo->title = $request->get('seoTitle');
            $seo->slug = $request->get('slug');
            $seo->keywords = $request->get('keywords');
            $seo->description = $request->get('description');
            $seo->save();
            $request->session()->flash('post_edit_form',true);
            Log::create(['table_name'=>'page','record_id'=>$id,'user_id'=>1,'method'=>'update']);
        }else{
            $request->session()->flash('post_edit_form',false);
        }
        return to_route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $result = Page::destroy($id);
        if($result){
            Seo::where('type',2)->where('owner_id',$id)->delete();
            session()->flash('page_delete_form',true);
            Log::create(['table_name'=>'page','record_id'=>$id,'user_id'=>1,'method'=>'delete']);
        }else{
            session()->flash('page_delete_form',false);
        }

        return to_route('admin.page.index');
    }
}
