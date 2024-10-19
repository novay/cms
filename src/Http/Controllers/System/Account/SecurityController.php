<?php

namespace Novay\CMS\Http\Controllers\System\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use ProtoneMedia\Splade\Facades\Splade;

class SecurityController extends Controller
{
    protected $title, $prefix, $view;

    public function __construct()
    {
        $this->title = ___('Ubah Sandi');
        
        $this->prefix = 'cms::systems.security';
        $this->view = 'cms::systems.account';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']), 
            'plain' => encrypt($validated['password'])
        ]);

        Splade::toast("Sandi berhasil diperbarui.");
        return redirect()->back();
    }
}
