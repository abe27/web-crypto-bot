<?php

namespace App\Http\Controllers;

use App\Models\ApiExchange;
use App\Http\Requests\StoreApiExchangeRequest;
use App\Http\Requests\UpdateApiExchangeRequest;

class ApiExchangeController extends Controller
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
     * @param  \App\Http\Requests\StoreApiExchangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApiExchangeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApiExchange  $apiExchange
     * @return \Illuminate\Http\Response
     */
    public function show(ApiExchange $apiExchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApiExchange  $apiExchange
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiExchange $apiExchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApiExchangeRequest  $request
     * @param  \App\Models\ApiExchange  $apiExchange
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApiExchangeRequest $request, ApiExchange $apiExchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApiExchange  $apiExchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiExchange $apiExchange)
    {
        //
    }
}
