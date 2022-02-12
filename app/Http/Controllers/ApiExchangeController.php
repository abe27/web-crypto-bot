<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\ApiExchange;
use App\Http\Requests\StoreApiExchangeRequest;
use App\Http\Requests\UpdateApiExchangeRequest;
use App\Models\Exchange;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ApiExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'จัดการข้อมูล API',
            'description' =>
                'จัดการข้อมูล API ที่ใช้ในการเทรดด้วยระบบอัตโนมัติ',
            'breadcrumbs' => [
                ['title' => 'หน้าแรก', 'url' => 'dashboard', 'active' => false],
                [
                    'title' => 'รายการ API ของฉัน',
                    'url' => 'api-data.index',
                    'active' => true,
                ],
            ],
            'on_date' => (new \DateTime())->format('d M Y H:i:s'),
        ];
        return Inertia::render('Api')->with($data);
    }

    public function get()
    {
        $data = ApiExchange::with([
            'get_exchange',
            'get_exchange.get_exchange_group',
        ])
            ->where('user_id', Auth::id())
            ->paginate();
        return response()->json($data);
    }

    public function exchange()
    {
        $data = Exchange::where('is_active', true)->paginate();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'เพิ่มข้อมูล API',
            'description' =>
                'เพิ่มข้อมูล API ที่ใช้ในการเทรดด้วยระบบอัตโนมัติ',
            'breadcrumbs' => [
                ['title' => 'หน้าแรก', 'url' => 'dashboard', 'active' => false],
                [
                    'title' => 'รายการ API ของฉัน',
                    'url' => 'api-data.index',
                    'active' => false,
                ],
                [
                    'title' => 'เพิ่มข้อมูล',
                    'url' => 'api-data.create',
                    'active' => true,
                ],
            ],
            'on_date' => (new \DateTime())->format('d M Y H:i:s'),
            'data' => [],
        ];

        return Inertia::render('ApiPages/FromInput')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApiExchangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApiExchangeRequest $request)
    {
        ApiExchange::create([
            'user_id' => $request->user()->id,
            'exchange_id' => $request->exchange_id,
            'api_key' => $request->api_key,
            'api_secret' => $request->api_secret,
            'expire_date' => $request->expire_date,
            'is_active' => true,
        ]);

        LogActivity::addToLog('เพิ่มข้อมูล API');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApiExchange  $apiExchange
     * @return \Illuminate\Http\Response
     */
    public function show(ApiExchange $apiExchange)
    {
        $data = [
            'title' => 'แสดงข้อมูลข้อมูล API',
            'description' =>
                'จัดการแก้ไขและเปลี่ยนข้อมูล API ที่ใช้ในการเทรดด้วยระบบอัตโนมัติ',
            'breadcrumbs' => [
                ['title' => 'หน้าแรก', 'url' => 'dashboard', 'active' => false],
                [
                    'title' => 'รายการ API ของฉัน',
                    'url' => 'api-data.index',
                    'active' => false,
                ],
                [
                    'title' => 'แสดงข้อมูลเพิ่ม',
                    'url' => 'api-data.show',
                    'active' => true,
                ],
            ],
            'on_date' => (new \DateTime())->format('d M Y H:i:s'),
            'data' => $apiExchange
        ];

        return Inertia::render('ApiPages/FromInput')->with($data);
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
        // return response()->json($apiData);
        LogActivity::addToLog('ลบข้อมูล API Token');
        return back()->with(['data' => $apiExchange->delete()]);
    }
}
