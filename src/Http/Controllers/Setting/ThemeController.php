<?php

namespace Novay\CMS\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class ThemeController extends Controller
{
    protected $title, $prefix, $view;

    public function __construct()
    {
        $this->title = __('novay/cms::menu.theme_selector');
        
        $this->prefix = 'cms::settings.themes';
        $this->view = 'cms::settings.themes';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function index(Request $request)
    {
        return view("{$this->view}.index");
    }
    
    public function store(Request $request)
    {
        $input = $request->validate(['theme' => 'required']);

        settings()->group('cms')->set('theme', $input['theme']);

        Splade::toast('Theme berhasil diperbarui.');
        return redirect()->back();
    }
}
