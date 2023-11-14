<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateways;
use App\Models\PaymentSystems;
use Illuminate\Http\Request;

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
        //
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
        //
    }
}