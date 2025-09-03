<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInviteRequest;
use App\Models\Division;
use App\Models\Invite;
use App\Models\UserRole;
use Illuminate\Support\Str;
use Inertia\Inertia;

class InviteController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Division $division)
    {
        return Inertia::render('pages/invite/create', [
            'division' => fn() => getResource($division),
            'roles' => fn() => getResource(UserRole::canCreate()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInviteRequest $request, Division $division)
    {
        $sendedInvutes = Invite::where('email', $request->input('email'))
            ->where('created_at', '>', now()->subMinutes(5))
            ->orderBy('created_at')
            ->get();

        if ($sendedInvutes->count() > 0) {
            $lastSendedInvite = $sendedInvutes->first();
            $diff = $lastSendedInvite->created_at->diff(now()->subMinutes(5));
            $diffString = $diff->minutes > 0
                ? $diff->format('%i минуты, %s секунд')
                : $diff->format('%s секунд');

            return back()->withErrors(['form' => 'Повторное уведомление для этого E-mail можно отправить только через: ' . $diffString]);
        }

        Invite::create([
            'email' => $request->input('email'),
            'token' => Str::random(40),
            'division_id' => $division->id,
            'role_id' => $request->input('role_id'),
        ]);

        return redirect()->route('users.index', compact('division'))->with('success', 'Приглашение успешно отправлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invite $invite, Division $division)
    {
        $invite->delete();

        return redirect()->route('users.index', compact('division'))->with('success', 'Приглашение удалено');
    }
}
