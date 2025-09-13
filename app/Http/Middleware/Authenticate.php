<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.showLogin');
        }

        if ($request->is('member') || $request->is('member/*')) {
            return route('member.showLogin');
        }

        if ($request->is('verification') || $request->is('verification/*')) {
            return route('verification.showLogin');
        }

        if ($request->is('registration') || $request->is('public/submit-data/*')) {
            return route('login');
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
