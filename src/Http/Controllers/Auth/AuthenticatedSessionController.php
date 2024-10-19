<?php

namespace Novay\CMS\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Novay\CMS\Models\Logs\Access;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('cms::auth.login');
    }

    public function store(\Novay\CMS\Http\Requests\LoginRequest $request)
    {
        $request->authenticate();

        Access::add($request->user());
        $request->user()->update([
            'last_login_at' => now(),
            'last_login_ip' => $request->getClientIp(),
        ]);

        $request->session()->regenerate();

        return redirect()->intended(config('boilerplate.route.home'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
