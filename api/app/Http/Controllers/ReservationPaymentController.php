<?php

namespace App\Http\Controllers;

use App\Models\ReservationPayment;
use App\Http\Requests\StoreReservationPaymentRequest;
use App\Http\Requests\UpdateReservationPaymentRequest;

class ReservationPaymentController extends Controller
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
     * @param  \App\Http\Requests\StoreReservationPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationPaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationPayment  $reservationPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationPayment $reservationPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationPaymentRequest  $request
     * @param  \App\Models\ReservationPayment  $reservationPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationPaymentRequest $request, ReservationPayment $reservationPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationPayment  $reservationPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationPayment $reservationPayment)
    {
        //
    }
}
