<?php

namespace App\Http\Controllers;

use App\Models\ShoeUsage;
use App\Http\Requests\StoreShoeUsageRequest;
use App\Http\Requests\UpdateShoeUsageRequest;

class ShoeUsageController extends Controller
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
     * @param  \App\Http\Requests\StoreShoeUsageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoeUsageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoeUsage  $shoeUsage
     * @return \Illuminate\Http\Response
     */
    public function show(ShoeUsage $shoeUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoeUsage  $shoeUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoeUsage $shoeUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoeUsageRequest  $request
     * @param  \App\Models\ShoeUsage  $shoeUsage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoeUsageRequest $request, ShoeUsage $shoeUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoeUsage  $shoeUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoeUsage $shoeUsage)
    {
        //
    }
}
