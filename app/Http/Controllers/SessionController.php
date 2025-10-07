<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectDivisionRequest;
use App\Http\Requests\StoreSessionRequest;
use Illuminate\Http\Request;
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
            return redirect()->route('home');

        return redirect()->route('session.create')->with('error', 'Неверный логин или пароль');
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('session.create');
    }

    public function selectDivisionGet(){
        return Inertia::render('pages/session/select-division',[
            'divisions' => fn() => getResource(user()->divisions(), 'full'),
        ]);
    }

    public function selectDivisionPost(SelectDivisionRequest $request){
        session(['user.division' => $request->division_id]);

        return redirect()->route('home');
    }
}
