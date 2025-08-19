<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankContractRequest;
use App\Http\Requests\UpdateBankContractRequest;
use App\Models\BankContract;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankContractRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BankContract $bankContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankContract $bankContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankContractRequest $request, BankContract $bankContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankContract $bankContract)
    {
        //
    }
}
