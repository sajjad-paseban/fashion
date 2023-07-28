<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Post;
use App\Models\Seo;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.pages.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status',true)->get();
        return view('admin.pages.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['status'=> $request->get('status')? true : false,'user_id'=>1]);
        $result = Post::create($request->except(['_method','_token']));
        if($result){
            $seo = new Seo;
            $seo->title = $request->get('seoTitle');
            $seo->slug = $request->get('slug');
            $seo->keywords = $request->get('keywords');
            $seo->description = $request->get('description');
            $seo->type = 1;
            $seo->owner_id = $result->id;
            $seo->save();
            $request->session()->flash('post_create_form',true);
            Log::create(['table_name'=>'post','record_id'=>$result->id,'user_id'=>1,'method'=>'create']);
        }else{
            $request->session()->flash('post_create_form',false);
        }

        return to_route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = Post::find($id);
        $categories = Category::where('status',true)->get();
        return view('admin.pages.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->merge(['status'=> $request->get('status')? true : false,'user_id'=>1]);
        $result = Post::where('id',$id)->update($request->only(['title','category_id','status','content','user_id']));

        if($result){
            $seo = Seo::where('owner_id',$id)->where('type',1)->first();
            $seo->title = $request->get('seoTitle');
            $seo->slug = $request->get('slug');
            $seo->keywords = $request->get('keywords');
            $seo->description = $request->get('description');
            $seo->save();
            $request->session()->flash('post_edit_form',true);
            Log::create(['table_name'=>'post','record_id'=>$id,'user_id'=>1,'method'=>'update']);
        }else{
            $request->session()->flash('post_edit_form',false);
        }
        return to_route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $result = Post::destroy($id);
        if($result){
            Seo::where('type',1)->where('owner_id',$id)->delete();
            session()->flash('post_delete_form',true);
            Log::create(['table_name'=>'post','record_id'=>$id,'user_id'=>1,'method'=>'delete']);
        }else{
            session()->flash('post_delete_form',false);
        }

        return to_route('admin.post.index');
    }
}
