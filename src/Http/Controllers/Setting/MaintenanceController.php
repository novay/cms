<?php

namespace Novay\CMS\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class MaintenanceController extends Controller
{
    protected $title, $prefix, $view;

    public function __construct()
    {
        $this->title = __('novay/cms::menu.maintenance');
        
        $this->prefix = 'cms::settings.maintenance';
        $this->view = 'cms::settings';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function index(Request $request)
    {
        return view("{$this->view}.maintenance");
    }
    
    public function store(Request $request)
    {
        $input = $request->validate([
            'maintenance' => 'nullable',
            'maintenance_note' => 'required_if:maintenance,1'
        ]);

        settings()->group('cms')->set('maintenance', $input['maintenance']);
        settings()->group('cms')->set('maintenance_note', $input['maintenance_note']);

        Splade::toast('Status maintenance berhasil diperbarui.');
        return redirect()->back();
    }
}
