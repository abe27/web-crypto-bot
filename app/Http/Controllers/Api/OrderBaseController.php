<?php

namespace App\Http\Controllers\Api;

use App\Helpers\LogActivity;
use App\Models\Order;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Api\OrderResource;

class OrderBaseController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LogActivity::addToLog('Api โหลดข้อมูล Order');
        $data = Order::where('status', 'Open')->get();
        return $this->sendResponse(
            OrderResource::collection($data),
            'Api Data By user fetched.'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // 'user_id' => 'required|uuid',
        // 'interest_id' => 'required',
        // 'order_type_id' => 'required',
        // 'orderno' => 'required|unique:orders',
        // 'at_price' => 'required|numeric',
        // 'total_coin' => 'required|numeric',
        // 'type' => 'required',
        // 'is_active' => 'required',
        // LogActivity::addToLog('Api บันทึกข้อมูล Order');
        // $data = Order::where('status', 'Open')->get();
        // return $this->sendResponse(
        //     OrderResource::collection($request),
        //     'Api Data By user fetched.'
        // );
        $valid = $request->validated();
        return $valid;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
