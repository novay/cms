<?php

namespace Novay\CMS\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    protected $title, $prefix, $view;

    public function __construct()
    {
        $this->title = ___('Maintenance');
        
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
        return dd($request->all());
    }
}
