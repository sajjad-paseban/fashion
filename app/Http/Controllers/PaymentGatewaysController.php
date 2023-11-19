<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateways;
use App\Models\PaymentSystems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaymentGatewaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_gateways = PaymentGateways::all();
        return view("admin.pages.payment_gateways.index", compact("payment_gateways"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_systems = PaymentSystems::where('status',true)->get();
        return view("admin.pages.payment_gateways.create", compact("payment_systems"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = null;
        if($request->hasFile('img_path')){
            $file = $request->file('img_path');
            $filename = Carbon::now().'-payment_gateways-'.$file->getClientOriginalName();
            $file->move(public_path().'/storage/payment_gateways', $filename);
        
        }
        $request_data = array_merge($request->all(),['status' => $request->status ? true : false,'img_path'=>$filename]);

        $res = PaymentGateways::create($request_data);   
        
        if($res){
            session()->flash('payment_gateways_create_form',true);
            return to_route('admin.payment_gateways.index');
        }else{
            session()->flash('payment_gateways_create_form',false);
            return to_route('admin.payment_gateways.index');
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
        $payment_systems = PaymentSystems::where('status',true)->get();
        $payment_gateway = PaymentGateways::find($id);
        return view('admin.pages.payment_gateways.edit', compact('payment_systems','payment_gateway'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment_gateway = PaymentGateways::find($id);
        $filename = $payment_gateway->img_path;
        if($request->hasFile('img_path')){
            File::delete(public_path().'/storage/payment_gateways/'.$filename);
            $file = $request->file('img_path');
            $filename = Carbon::now().'-payment_gateways-'.$file->getClientOriginalName();
            $file->move(public_path().'/storage/payment_gateways', $filename);
        }
        
        $request_data = array_merge($request->all(),['status' => $request->status ? true : false,'img_path'=>$filename]);

        $res = $payment_gateway->update($request_data);

        if($res){
            session()->flash('payment_gateways_edit_form',true);
            return to_route('admin.payment_gateways.index');
        }else{
            session()->flash('payment_gateways_edit_form',false);
            return to_route('admin.payment_gateways.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment_gateway = PaymentGateways::find($id);
        $filename = $payment_gateway->img_path;
        if($payment_gateway->delete()){
            File::delete(public_path().'/storage/payment_gateways/'.$filename);

            session()->flash('payment_gateways_delete_form',true);
            return to_route('admin.payment_gateways.index');
        }

        session()->flash('payment_gateways_delete_form',false);
        return to_route('admin.payment_gateways.index');
    }
}
