<?php

namespace App\Http\Controllers;

use App\Models\ExchangeGroup;
use App\Http\Requests\StoreExchangeGroupRequest;
use App\Http\Requests\UpdateExchangeGroupRequest;

class ExchangeGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreExchangeGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExchangeGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExchangeGroup  $exchangeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ExchangeGroup $exchangeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExchangeGroup  $exchangeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ExchangeGroup $exchangeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExchangeGroupRequest  $request
     * @param  \App\Models\ExchangeGroup  $exchangeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExchangeGroupRequest $request, ExchangeGroup $exchangeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExchangeGroup  $exchangeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExchangeGroup $exchangeGroup)
    {
        //
    }
}
