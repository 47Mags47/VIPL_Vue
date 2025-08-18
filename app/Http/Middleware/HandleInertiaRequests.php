<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $shared = parent::share($request);

        if (in_array('auth', $request->route()->middleware()))
            $shared['current_user'] = user()->toResource();

        if(!in_array('shared', $shared))
            $shared['flash'] = [];

        if ($request->session()->has('message'))
            $shared['flash']['success'][] = $request->session()->get('message');

        if ($request->session()->has('error'))
            $shared['flash']['error'][] = $request->session()->get('error');

        if ($request->session()->has('info'))
            $shared['flash']['info'][] = $request->session()->get('info');

        if ($request->session()->has('warning'))
            $shared['flash']['warning'][] = $request->session()->get('warning');

        if ($request->session()->has('loading'))
            $shared['flash']['loading'][] = $request->session()->get('loading');

        return $shared;
    }
}
