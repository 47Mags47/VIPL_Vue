<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Division;
use App\Models\Invite;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    // public function index(Division $division)
    // {
    //     return Inertia::render('pages/users/index', [
    //         'division' => fn() => getResource($division),
    //         'users' => fn() => getResource($division->users()),
    //     ]);
    // }

    public function create(CreateUserRequest $request)
    {
        $invite = Invite::whereToken($request->input('token'))->first();

        if ($invite === null)
            abort(403);

        return Inertia::render('pages/users/create', [
            'invite' => fn() => getResource($invite)
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $invite = Invite::whereToken($request->input('token'))->first();

        if ($invite === null)
            return back()->with('error', 'Неверный токен приглашения. Запросите приглашение заново');

        $user = User::create([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'middle_name'       => $request->input('middle_name'),
            'login'             => $request->input('login'),
            'email'             => $invite->email,
            'password'          => Hash::make($request->input('password')),
            'password_expired'  => false,
            'status_id'         => UserStatus::byCode('active')->id,
            'email_verified_at' => now(),
        ])
            ->addDivision($invite->division, $invite->role);

        $invite->delete();

        Auth::login($user);

        return redirect()->route('dashboard.index')->with('success', 'Вы успешно зарегестрировались');
    }
}
