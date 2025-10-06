<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentEventRequest;
use App\Http\Requests\UpdatePaymentEventRequest;
use App\Models\Payment;
use App\Models\PaymentEvent;
use App\Models\PaymentEventStatus;
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
            'month' => fn() => $monthStart->format('Y-m-d'),
            'payment-events' => fn() => getResource(PaymentEvent::whereBetween('date', [$monthStart, $monthEnd])->orderBy('date'), 'full')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pages/payment-events/create', [
            'payments' => fn()=> getResource(Payment::class, 'full'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentEventRequest $request)
    {
        PaymentEvent::create([
            'date' => $request->input('date'),
            'payment_id' => $request->input('payment_id'),
            'status_id' => PaymentEventStatus::bycode('active')->id,
        ]);

        return redirect()->route('payment-events.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentEvent $paymentEvent)
    {
        return Inertia::render('pages/payment-events/edit', [
            'payment-event' => fn() => getResource($paymentEvent),
            'payments' => fn()=> getResource(Payment::class, 'full'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentEventRequest $request, PaymentEvent $paymentEvent)
    {
        $paymentEvent->update([
            'date' => $request->input('date'),
            'payment_id' => $request->input('payment_id'),
            'status_id' => PaymentEventStatus::bycode('active')->id,
        ]);

        return redirect()->route('payment-events.index')->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentEvent $paymentEvent)
    {
        $paymentEvent->delete();

        return redirect()->route('payment-events.index')->with('success', 'Запись удалена');
    }
}
