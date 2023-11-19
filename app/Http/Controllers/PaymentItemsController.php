<?php

namespace App\Http\Controllers;

use App\Models\PaymentItems;
use App\Models\Post;
use Illuminate\Http\Request;

class PaymentItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_items = PaymentItems::all();
        return view("admin.pages.payment_items.index",compact('payment_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentItems_ids = PaymentItems::pluck('id');
        $posts = Post::where('is_payable',true)->whereNotIn('id',$paymentItems_ids)->get();
        return view('admin.pages.payment_items.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = PaymentItems::create($request->all());
   
        if($res)
            session()->flash('payment_items_create_form',true);
        else
            session()->flash('payment_items_create_form',false);

        return to_route('admin.payment_items.index');

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
        $posts = Post::where('is_payable')->get();
        $payment_item = PaymentItems::find($id);
        return view('admin.pages.payment_items.edit',compact('posts','payment_item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $res = PaymentItems::find($id)->update($request->all());
   
        if($res)
            session()->flash('payment_items_edit_form',true);
        else
            session()->flash('payment_items_edit_form',false);

        return to_route('admin.payment_items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = PaymentItems::find($id)->delete();
        if($res)
            session()->flash('payment_items_delete_form',true);
        else
            session()->flash('payment_items_delete_form',false);

        return to_route('admin.payment_items.index');
    }
}
