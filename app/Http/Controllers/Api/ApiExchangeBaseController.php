<?php

namespace App\Http\Controllers\Api;

use App\Helpers\LogActivity;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\StoreApiExchangeRequest;
use App\Http\Requests\UpdateApiExchangeRequest;
use App\Http\Resources\Api\ApiExchangeResource;
use App\Models\ApiExchange;
use Illuminate\Http\Request;

class ApiExchangeBaseController extends BaseApiController
{
    /**
     * Require Request with method get
     */
    public function index(Request $request)
    {
        LogActivity::addToLog('Api โหลดข้อมูล');
        $blogs = ApiExchange::where('user_id', $request->user()->id)
            ->where('is_active', true)
            ->get();
        return $this->sendResponse(
            ApiExchangeResource::collection($blogs),
            'Api Data By user fetched.'
        );
    }

    public function store(StoreApiExchangeRequest $request)
    {
        $db = ApiExchange::where('api_key', $request->api_key)
            ->where('api_secret', $request->api_secret)
            ->first();
        if ($db) {
            return $this->sendResponse(
                new ApiExchangeResource($db),
                'Data is duplicate.'
            );
        }

        $db = new ApiExchange();
        $db->user_id = $request->user()->id;
        $db->exchange_id = $request->exchange_id;
        $db->api_key = $request->api_key;
        $db->api_secret = $request->api_secret;
        $db->expire_date = $request->expire_date;
        $db->is_active = $request->is_active;
        $db->save();
        LogActivity::addToLog('Api สร้างข้อมูล');
        return $this->sendResponse(
            new ApiExchangeResource($db),
            'Api Data created.'
        );
    }

    public function show(Request $request, ApiExchange $apiExchange)
    {
        $data = ApiExchange::where('api_key', $apiExchange->id)
            ->where('user_id', $request->user()->id)
            ->first();
        if (is_null($data)) {
            return $this->sendError('Api Data does not exist.');
        }

        LogActivity::addToLog('Api แสดงข้อมูล');
        return $this->sendResponse(
            new ApiExchangeResource($data),
            'Api Data fetched.'
        );
    }

    public function update(
        UpdateApiExchangeRequest $request,
        ApiExchange $apiExchange
    ) {
        $apiExchange->user_id = $request->user()->id;
        $apiExchange->exchange_id = $request->exchange_id;
        $apiExchange->api_key = $request->api_key;
        $apiExchange->api_secret = $request->api_secret;
        $apiExchange->expire_date = $request->expire_date;
        $apiExchange->is_active = $request->is_active;
        $apiExchange->save();

        LogActivity::addToLog('Api อัพเดทข้อมูล');
        return $this->sendResponse(
            new ApiExchangeResource($apiExchange),
            'Api Data updated.'
        );
    }

    public function destroy(ApiExchange $apiExchange)
    {
        $apiExchange->delete();
        LogActivity::addToLog('Api ลบข้อมูล');
        return $this->sendResponse([], 'Api Data deleted.');
    }
}
