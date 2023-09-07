<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.category.index',compact('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.category.create',compact('categories'));
    }
        
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->merge(['status'=> $request->get('status')? true : false]);

        $result = Category::create($request->except(['_method','_token']));
        if($result){
            $request->session()->flash('category_create_form',true);
        }else{
            $request->session()->flash('category_create_form',false);
        }

        return to_route('admin.category.index');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(int $id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(int $id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        return view('admin.pages.category.edit',compact('categories','category'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, int $id)
    {
        $request->merge(['status'=> $request->get('status')? true : false]);
        $result = Category::where('id',$id)->update($request->except(['_method','_token']));
        if($result){
            $request->session()->flash('category_edit_form',true);
        }else{
            $request->session()->flash('category_edit_form',false);
        }

        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $result = Category::destroy($id);
        if($result){
            session()->flash('category_delete_form',true);
        }else{
            session()->flash('category_delete_form',false);
        }

        return to_route('admin.category.index');
    }
}
