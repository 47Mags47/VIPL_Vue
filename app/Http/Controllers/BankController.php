<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use App\Models\BankContract;
use Inertia\Inertia;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('pages/banks/index', [
            'banks' => fn() => getResource(Bank::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pages/banks/create', [
            'contracts' => fn() => getResource(BankContract::class),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankRequest $request)
    {
        Bank::create($request->only('code', 'name', 'contract_id'));

        return redirect()->route('banks.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return Inertia::render('pages/banks/edit', [
            'bank' => fn() => getResource($bank),
            'contracts' => fn() => getResource(BankContract::class),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->only('code', 'name', 'contract_id'));

        return redirect()->route('banks.index')->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('banks.index')->with('success', 'Запись удалена');
    }
}
