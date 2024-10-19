<?php

namespace Novay\CMS\Http\Controllers\Setting\Logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

use Novay\CMS\Models\Logs\Access;
use Novay\CMS\Tables\Logs\AccessTable;

class AccessController extends Controller
{
    protected $title, $prefix, $view;
    protected $data, $table;

    public function __construct()
    {
        $this->title = ___('Access Log');

        $this->data = new Access;
        $this->table = new AccessTable;
        
        $this->prefix = 'cms::settings.logs.access';
        $this->view = 'cms::settings.logs.access';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function index(Request $request)
    {
        $table = Splade::onLazy(fn () => $this->table);

        return view("{$this->view}.index", compact('table'));
    }

    public function show(Request $request, $id)
    {
        $data = $this->data->findOrFail($id);

        return view("{$this->view}.show", compact('data'));
    }
}
