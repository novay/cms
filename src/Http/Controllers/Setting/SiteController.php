<?php

namespace Novay\CMS\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class SiteController extends Controller
{
    protected $title, $prefix, $view;

    public function __construct()
    {
        $this->title = ___('Site Definitions');
        
        $this->prefix = 'cms::settings.sites';
        $this->view = 'cms::settings.sites';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function index(Request $request)
    {
        $logo = NULL;
        if($logo = settings()->group('cms')->get('logo')) {
            $logo = asset('storage/'.$logo);
        }

        $favicon = NULL;
        if($favicon = settings()->group('cms')->get('favicon')) {
            $favicon = asset('storage/'.$favicon);
        }

        $login_image = NULL;
        if($login_image = settings()->group('cms')->get('login_image')) {
            $login_image = asset('storage/'.$login_image);
        }

        return view("{$this->view}.index", compact('logo', 'favicon', 'login_image'));
    }
    
    public function store(Request $request)
    {
        switch ($request->purpose) {
            case 'general':
                $input = $request->validate([
                    'name' => 'required', 
                    'tagline' => 'required', 
                    'locale' => 'required', 
                    'timezone' => 'required'
                ]);

                settings()->group('cms')->set('name', $input['name']);
                settings()->group('cms')->set('tagline', $input['tagline']);
                settings()->group('cms')->set('locale', $input['locale']);
                settings()->group('cms')->set('timezone', $input['timezone']);

                Splade::toast('Backend settings berhasil diperbarui.');

            case 'brand':
                $input = $request->validate([
                    'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                if($request->hasFile('logo')) {
                    if($logo = settings()->group('cms')->get('logo')) {
                        \Storage::disk('public')->delete($logo);
                    }

                    settings()->group('cms')->set('logo', $request->file('logo')->store('images/logo', 'public'));
                }

                if($request->hasFile('favicon')) {
                    if($favicon = settings()->group('cms')->get('favicon')) {
                        \Storage::disk('public')->delete($favicon);
                    }

                    settings()->group('cms')->set('favicon', $request->file('favicon')->store('images/favicon', 'public'));
                }

                Splade::toast('Brand berhasil diperbarui.');

            case 'login':
                $input = $request->validate([
                    'login_message' => 'required', 
                    'login_type' => 'required', 
                    'login_color' => 'required_if:login_type,Color', 
                    'login_image' => 'required_if:login_type,Wallpaper|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                settings()->group('cms')->set('login_message', $input['login_message']);
                settings()->group('cms')->set('login_type', $input['login_type']);
                settings()->group('cms')->set('login_color', $input['login_type'] == 'Color' ? $input['login_color'] : NULL);

                if($request->hasFile('login_image') && $input['login_type'] == 'Wallpaper') {
                    if($login_image = settings()->group('cms')->get('login_image')) {
                        \Storage::disk('public')->delete($login_image);
                    }

                    settings()->group('cms')->set('login_image', $request->file('login_image')->store('images/login_image', 'public'));
                }

                Splade::toast('Login page berhasil diperbarui.');

            default: break;
        }

        return redirect()->back();
    }
}
