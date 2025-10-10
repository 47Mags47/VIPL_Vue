<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionUserRequest;
use App\Http\Requests\UpdateDivisionUserRequest;
use App\Mail\InviteMail;
use App\Models\Division;
use App\Models\DivisionRole;
use App\Models\DivisionUser;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DivisionUserController extends Controller
{
    public function index(Division $division)
    {
        return Inertia::render('pages/division/users/index', [
            'division' => fn() => getResource($division),
            'users' => fn() => getResource($division->users()),
        ]);
    }

    public function create(Division $division)
    {
        return Inertia::render('pages/division/users/create', [
            'division' => fn() => getResource($division),
            'roles' => fn() => getResource(DivisionRole::class),
        ]);
    }

    public function store(StoreDivisionUserRequest $request, Division $division)
    {
        if ($division->users->pluck('email')->contains($request->input('email')))
            return back()->withErrors(['email' => 'Пользователь с данным E-mail уже зарегистрирован']);

        $division->invites()->where('email', $request->input('email'))->delete();

        $invite = Invite::create([
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'division_id' => $division->id,
            'token' => Str::random(40),
        ]);

        Mail::to($invite->email)->queue(new InviteMail($invite));

        return redirect()->route('division.users.index', ['division' => $division])
            ->with('success', 'Приглашение успешно отправлено');
    }

    public function edit(Division $division, DivisionUser $user)
    {
        return Inertia::render('pages/division/users/edit', [
            'user' => fn() => getResource($user->toDivision($division)),
            'division' => fn() => getResource($division),
            'roles' => fn() => getResource(DivisionRole::class),
        ]);
    }

    public function update(UpdateDivisionUserRequest $request, Division $division, DivisionUser $user){
        $user->setDivisionRole($division, (int) $request->validated('role_id'));

        return redirect()->route('division.users.index', ['division' => $division])
            ->with('success', 'Данные успешно изменены');
    }

    public function destroy(Division $division, DivisionUser $user){
        $user->toDivision($division)->pivot->delete();

        return redirect()->route('division.users.index', ['division' => $division])
            ->with('success', 'Пользватель удален из организации');
    }
}
