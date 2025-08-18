<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create()
    {
        return Inertia::render('pages/session/login');
    }

    public function store(StoreSessionRequest $request)
    {
        if (Auth::attempt($request->only('login', 'password'), $request->has('remember')))
            return redirect()->route('test');

        return redirect()->route('session.create')->with('error', 'Неверный логин или пароль');
    }
}
