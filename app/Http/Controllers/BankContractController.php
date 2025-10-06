<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankContractRequest;
use App\Http\Requests\UpdateBankContractRequest;
use App\Models\BankContract;
use App\Models\Writer;
use App\Models\WriterType;
use Inertia\Inertia;

class BankContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('pages/bank-contracts/index', [
            'bank-contracts' => fn() => getResource(BankContract::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pages/bank-contracts/create', [
            'writers' => fn() => getResource(Writer::where('type_id', WriterType::byCode('bank-file')->id), 'full')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankContractRequest $request)
    {
        BankContract::create($request->only('number', 'signed_at', 'writer_id'));

        return redirect()->route('bank-contracts.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankContract $bankContract)
    {
        return Inertia::render('pages/bank-contracts/edit', [
            'bankContract' => fn() => getResource($bankContract),
            'writers' => fn() => getResource(Writer::where('type_id', WriterType::byCode('bank-file')->id), 'full')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankContractRequest $request, BankContract $bankContract)
    {
        $bankContract->update($request->only('number', 'signed_at', 'writer_id'));

        return redirect()->route('bank-contracts.index')->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankContract $bankContract)
    {
        $bankContract->delete();

        return back()->with('success', 'Запись удалена');
    }
}
