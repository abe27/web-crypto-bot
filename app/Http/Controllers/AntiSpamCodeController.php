<?php

namespace App\Http\Controllers;

use App\Models\AntiSpamCode;
use App\Http\Requests\StoreAntiSpamCodeRequest;
use App\Http\Requests\UpdateAntiSpamCodeRequest;

class AntiSpamCodeController extends Controller
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
     * @param  \App\Http\Requests\StoreAntiSpamCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAntiSpamCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AntiSpamCode  $antiSpamCode
     * @return \Illuminate\Http\Response
     */
    public function show(AntiSpamCode $antiSpamCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AntiSpamCode  $antiSpamCode
     * @return \Illuminate\Http\Response
     */
    public function edit(AntiSpamCode $antiSpamCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAntiSpamCodeRequest  $request
     * @param  \App\Models\AntiSpamCode  $antiSpamCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAntiSpamCodeRequest $request, AntiSpamCode $antiSpamCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AntiSpamCode  $antiSpamCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(AntiSpamCode $antiSpamCode)
    {
        //
    }
}
