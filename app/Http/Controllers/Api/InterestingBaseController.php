<?php

namespace App\Http\Controllers\Api;

use App\Helpers\LogActivity;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\StoreInterestingRequest;
use App\Http\Requests\UpdateInterestingRequest;
use App\Http\Resources\Api\InterestingResource;
use App\Models\Asset;
use App\Models\Currency;
use App\Models\Exchange;
use App\Models\Interesting;
use Illuminate\Http\Request;

class InterestingBaseController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LogActivity::addToLog('Api โหลดข้อมูล');
        $data = Interesting::where('is_active', true)->get();
        return $this->sendResponse(
            InterestingResource::collection($data),
            'Api Data By user fetched.'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterestingRequest $request)
    {
        $asset = Asset::where('symbol', $request->asset_id)->first();
        $exchange = Exchange::where('name', $request->exchange_id)->first();
        $currency = Currency::where('currency', $request->currency_id)->first();

        $db = new Interesting();
        $db->asset_id = $asset->id;
        $db->exchange_id = $exchange->id;
        $db->currency_id = $currency->id;
        $db->trend = $request->trend;
        $db->last_price = $request->last_price;
        $db->last_percent = $request->last_percent;
        $db->open_order = false;
        $db->is_active = true;
        $db->save();
        LogActivity::addToLog('Api สร้างข้อมูล');
        return $this->sendResponse(
            new InterestingResource($db),
            'Api Data created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Interesting $interesting)
    {
        LogActivity::addToLog('Api ตรวจข้อมูล');
        return $this->sendResponse(new InterestingResource($interesting),'Api Data show.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterestingRequest $request, Interesting $interesting)
    {

        $interesting->trend = $request->trend;
        $interesting->last_price = $request->last_price;
        $interesting->last_percent = $request->last_percent;
        $interesting->open_order = false;
        $interesting->is_active = true;
        $interesting->save();
        LogActivity::addToLog('Api อัพเดทข้อมูล');
        return $this->sendResponse(
            new InterestingResource($interesting),
            'Api Data updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interesting $interesting)
    {
        $interesting->delete();
        LogActivity::addToLog('Api ลบข้อมูล');
        return $this->sendResponse(new InterestingResource($interesting),'Api Data deleted.');
    }
}