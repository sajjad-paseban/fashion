<?php

namespace App\Http\Controllers;

use App\Models\PaymentLogs;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_logs = PaymentLogs::all();
        return view('admin.pages.payment_logs.index', compact('payment_logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::where('is_payable',true)->get();
        $users = User::all();
        return view('admin.pages.payment_logs.create', compact('posts','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['status' => $request->status ? true : false]);
        $res = PaymentLogs::create($request->all());
        
        if($res)
            session()->flash('payment_logs_create_form',true);
        else
            session()->flash('payment_logs_create_form',false);

        return to_route('admin.payment_logs.index');
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
        $payment_log = PaymentLogs::find($id);
        $posts = Post::where('is_payable',true)->get();
        $users = User::all();
        return view('admin.pages.payment_logs.edit', compact('payment_log','posts','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(['status' => $request->status ? true : false]);
        $res = PaymentLogs::find($id)->update($request->all());
   
        if($res)
            session()->flash('payment_logs_edit_form',true);
        else
            session()->flash('payment_logs_edit_form',false);

        return to_route('admin.payment_logs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = PaymentLogs::find($id)->delete();
        if($res)
            session()->flash('payment_logs_delete_form',true);
        else
            session()->flash('payment_logs_delete_form',false);

        return to_route('admin.payment_logs.index');

    }
}
