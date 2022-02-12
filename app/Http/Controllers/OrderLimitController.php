<?php

namespace App\Http\Controllers;

use App\Models\OrderLimit;
use App\Http\Requests\StoreOrderLimitRequest;
use App\Http\Requests\UpdateOrderLimitRequest;

class OrderLimitController extends Controller
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
     * @param  \App\Http\Requests\StoreOrderLimitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderLimitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderLimit  $orderLimit
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLimit $orderLimit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderLimit  $orderLimit
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLimit $orderLimit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderLimitRequest  $request
     * @param  \App\Models\OrderLimit  $orderLimit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderLimitRequest $request, OrderLimit $orderLimit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderLimit  $orderLimit
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLimit $orderLimit)
    {
        //
    }
}
