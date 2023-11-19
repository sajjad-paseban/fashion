<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Post;
use App\Models\Seo;
use Carbon\Carbon;
use File;
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
        $post = new Post;
        
        if($request->hasFile('path')){
            $file = $request->file('path');
            $filename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            $file->move('storage/post/',$filename);
            $post->path = $filename;                  
        }

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->user_id = $request->session()->get('user_id');
        $post->status = $request->get('status')? true : false;
        $post->is_payable = $request->get('is_payable')? true : false;

        $result = $post->save();
        if($result){
            $seo = new Seo;
            $seo->title = $request->get('seoTitle');
            $seo->slug = $request->get('slug');
            $seo->keywords = $request->get('keywords');
            $seo->description = $request->get('description');
            $seo->type = 1;
            $seo->owner_id = $post->id;
            $seo->save();
            $request->session()->flash('post_create_form',true);
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
        $post = Post::find($id);
        
        if($request->hasFile('path')){
            $file = $request->file('path');
            File::delete('storage/post/'.$post->path);
            $filename = Carbon::now()->format('Y-m-d-H-i-s-').$file->getClientOriginalName();
            $file->move('storage/post/',$filename);
            $post->path = $filename;                  
        }

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->user_id = $request->session()->get('user_id');
        $post->status = $request->get('status')? true : false;
        $post->is_payable = $request->get('is_payable')? true : false;
        
        $result = $post->save();
        if($result){
            $seo = Seo::where('owner_id',$id)->where('type',1)->first();
            $seo->title = $request->get('seoTitle');
            $seo->slug = $request->get('slug');
            $seo->keywords = $request->get('keywords');
            $seo->description = $request->get('description');
            $seo->save();
            $request->session()->flash('post_edit_form',true);
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
        $filename = Post::find($id)->path;
        $result = Post::destroy($id);
        if($result){
            Seo::where('type',1)->where('owner_id',$id)->delete();
            File::delete('storage/post/'.$filename);
            session()->flash('post_delete_form',true);
        }else{
            session()->flash('post_delete_form',false);
        }

        return back();
    }
}
