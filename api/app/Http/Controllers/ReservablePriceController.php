<?php

namespace App\Http\Controllers;

use App\Models\ReservablePrice;
use App\Http\Requests\StoreReservablePriceRequest;
use App\Http\Requests\UpdateReservablePriceRequest;

class ReservablePriceController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservablePriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservablePriceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservablePrice  $reservablePrice
     * @return \Illuminate\Http\Response
     */
    public function show(ReservablePrice $reservablePrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservablePriceRequest  $request
     * @param  \App\Models\ReservablePrice  $reservablePrice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservablePriceRequest $request, ReservablePrice $reservablePrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservablePrice  $reservablePrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservablePrice $reservablePrice)
    {
        //
    }
}
