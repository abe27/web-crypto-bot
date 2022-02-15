<?php

namespace App\Http\Controllers;

use App\Models\Interesting;
use App\Http\Requests\StoreInterestingRequest;
use App\Http\Requests\UpdateInterestingRequest;
use App\Http\Resources\Api\InterestingResource;
use Inertia\Inertia;

class InterestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'รายการที่น่าสนใจ',
            'description' => 'รายการ Asset ที่น่าเข้าเทรด',
            'breadcrumbs' => [
                ['title' => 'หน้าแรก', 'url' => 'dashboard', 'active' => false],
                [
                    'title' => 'รายการที่น่าสนใจ',
                    'url' => 'interesting.index',
                    'active' => true,
                ],
            ],
            'on_date' => (new \DateTime())->format('d M Y H:i:s'),
        ];
        return Inertia::render('Interesting')->with($data);
    }

    public function get()
    {
        $data = Interesting::orderBy('trend', 'desc')
            ->orderBy('last_percent', 'asc')
            ->paginate();
        return InterestingResource::collection($data);
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
     * @param  \App\Http\Requests\StoreInterestingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterestingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interesting  $interesting
     * @return \Illuminate\Http\Response
     */
    public function show(Interesting $interesting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interesting  $interesting
     * @return \Illuminate\Http\Response
     */
    public function edit(Interesting $interesting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInterestingRequest  $request
     * @param  \App\Models\Interesting  $interesting
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateInterestingRequest $request,
        Interesting $interesting
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interesting  $interesting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interesting $interesting)
    {
        //
    }
}
