<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;
use App\Models\Writer;
use App\Models\WriterType;
use Inertia\Inertia;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('pages/writers/index', [
            'writers' => fn() => getResource(Writer::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pages/writers/create', [
            'types' => fn() => getResource(WriterType::class),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWriterRequest $request)
    {
        Writer::create($request->only('type_id', 'code', 'name', 'class'));

        return redirect()->route('writers.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Writer $writer)
    {
        return Inertia::render('pages/writers/edit', [
            'writer' => fn() => getResource($writer),
            'types' => fn() => getResource(WriterType::class),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        $writer->update($request->only('type_id', 'code', 'name', 'class'));

        return redirect()->route('writers.index')->with('success', 'Запись успешно создана');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();

        return redirect()->route('writers.index')->with('success', 'Запись удалена');
    }
}
