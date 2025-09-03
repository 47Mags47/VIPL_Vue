<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLawRequest;
use App\Http\Requests\UpdateLawRequest;
use App\Models\Law;
use Inertia\Inertia;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('pages/laws/index', [
            'laws' => fn() => getResource(Law::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('pages/laws/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLawRequest $request)
    {
        Law::create($request->only('code', 'name'));

        return redirect()->route('laws.index')->with('success', 'Запись успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Law $law)
    {
        return Inertia::render('pages/laws/edit', [
            'law' => getResource($law),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLawRequest $request, Law $law)
    {
        $law->update($request->only('code', 'name'));

        return redirect()->route('laws.index')->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Law $law)
    {
        $law->delete();
        return back()->with('success', 'Запись удалена');
    }
}
