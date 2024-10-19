<?php

namespace Novay\CMS\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Novay\CMS\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        if(!config('boilerplate.settings.register')):
            return abort(404);
        endif;

        return view('cms::auth.register');
    }

    public function store(Request $request)
    {
        if(!config('boilerplate.settings.register')):
            return abort(404);
        endif;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(config('boilerplate.route.home'));
    }
}
