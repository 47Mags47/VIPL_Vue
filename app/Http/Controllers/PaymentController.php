<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Law;
use App\Models\Payment;
use Inertia\Inertia;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('pages/payments/index', [
            'payments' => fn() => getResource(Payment::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pages/payments/create', [
            'laws' => fn() => getResource(Law::class, 'full'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        Payment::create($request->only('code', 'name', 'kbk', 'law_id'));

        return redirect()->route('payments.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return Inertia::render('pages/payments/edit', [
            'payment' => fn() => getResource($payment),
            'laws' => fn() => getResource(Law::class, 'full'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->only('code', 'name', 'kbk', 'law_id'));

        return redirect()->route('payments.index')->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return back()->with('success', 'Запись удалена');
    }
}
