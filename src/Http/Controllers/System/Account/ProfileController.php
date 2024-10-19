<?php

namespace Novay\CMS\Http\Controllers\System\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class ProfileController extends Controller
{
    protected $title, $prefix;

    public function __construct()
    {
        $this->title = ___('Profil Saya');
        
        $this->prefix = 'cms::systems.profile';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix
        ]);
    }

    public function index(Request $request)
    {
        $user = $request->user();
        if(!is_null($user['photo'])):
            $user['original'] = ImageKit($user['photo']);
            $user['photo'] = NULL;
        endif;

        return view("cms::systems.account.profile", [
            'user' => $user
        ]);
    }

    public function store(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        Splade::toast("Profile updated successfully.");
        return redirect()->back();
    }
}
