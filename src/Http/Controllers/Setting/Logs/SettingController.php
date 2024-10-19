<?php

namespace Novay\CMS\Http\Controllers\Setting\Logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class SettingController extends Controller
{
    protected $title, $prefix, $view;

    public function __construct()
    {
        $this->title = ___('Log Settings');
        
        $this->prefix = 'cms::settings.logs.settings';
        $this->view = 'cms::settings.logs.settings';

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
        $input = $request->validate([
            'log_requests' => 'required', 
            'log_events' => 'required'
        ]);

        settings()->group('cms')->set('log_requests', $input['log_requests']);
        settings()->group('cms')->set('log_events', $input['log_events']);

        Splade::toast('Log settings berhasil diperbarui.');
        return redirect()->back();
    }
}
