<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentEventRequest;
use App\Http\Requests\UpdatePaymentEventRequest;
use App\Http\Resources\PaymentEventGroupDateResource;
use App\Models\PaymentEvent;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $year = (int) ($request->input('year') ?? now()->year);
        $month = (int) ($request->input('month') ?? now()->month);

        $monthStart = CarbonImmutable::create($year, $month, 1)->startOfMonth();
        $monthEnd = $monthStart->endOfMonth();

        return Inertia::render('pages/payment-events/index', [
            'month' => fn() => "$year-$month",
            'payment-events' => fn() => getResource(PaymentEvent::whereBetween('date', [$monthStart, $monthEnd])->orderBy('date'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentEvent $paymentEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentEvent $paymentEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentEventRequest $request, PaymentEvent $paymentEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentEvent $paymentEvent)
    {
        //
    }
}
