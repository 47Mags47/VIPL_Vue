<?php

namespace App\Http\Controllers;

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
    public function index(Division $division)
    {
        return Inertia::render('pages/users/index', [
            'division' => fn() => getResource($division),
            'users' => fn() => getResource($division->users()),
        ]);
    }

    public function create(string $token)
    {
        $invite = Invite::where('token', $token)->get()->first();

        if ($invite !== null)
            return Inertia::render('pages/users/create', [
                'invite' => fn() => getResource($invite)
            ]);

        return abort(403);
    }

    public function store(StoreUserRequest $request){
        $invite = Invite::where('token', $request->input('token'))->first();

        if($invite === null)
            return back()->with('error', 'Неверный токен приглашения. Запросите приглашение заново');

        $user = User::create([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'middle_name'       => $request->input('middle_name'),
            'login'             => $request->input('login'),
            'email'             => $invite->email,
            'password'          => Hash::make($request->input('password')),
            'password_expired'  => false,
            'division_id'       => $invite->division->id,
            'status_id'         => UserStatus::byCode('active')->id,
            'role_id'           => $invite->role->id,
            'email_verified_at' => now(),
        ]);

        Auth::login($user);

        $invite->delete();

        return redirect()->route('home')->with('success', 'Вы успешно зарегестрировались');
    }
}
