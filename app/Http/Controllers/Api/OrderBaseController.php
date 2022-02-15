<?php

namespace App\Http\Controllers\Api;

use App\Helpers\LogActivity;
use App\Models\Order;
use App\Models\Currency;
use App\Models\Asset;
use App\Models\Interesting;
use App\Models\OrderType;
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
        // return $request->user()->id;
        $currency = Currency::where('currency', $request->currency)->first();
        $asset = Asset::where('symbol', $request->interest)->first();
        $interest = Interesting::where('asset_id', $asset->id)->where('currency_id', $currency->id)->first();
        $order_type = OrderType::where('title', $request->order_type)->first();

        $db = new Order();
        $db->user_id = $request->user()->id;
        $db->interest_id = $interest->id;
        $db->order_type_id = $order_type->id;
        $db->orderno = $request->orderno;
        $db->at_price = $request->price;
        $db->total_coin = $request->total_coin;
        $db->type = $request->type;
        $db->status = $request->status;
        $db->save();

        LogActivity::addToLog('Api บันทึกข้อมูล Order');
        return $this->sendResponse(new OrderResource($db),'Create Order is completed.');
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
