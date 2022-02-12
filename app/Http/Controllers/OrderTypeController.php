<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Http\Response
     */
    public function show(OrderType $orderType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderType $orderType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderTypeRequest  $request
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderTypeRequest $request, OrderType $orderType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderType  $orderType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderType $orderType)
    {
        //
    }
}
