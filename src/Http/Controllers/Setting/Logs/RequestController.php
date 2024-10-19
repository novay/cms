<?php

namespace Novay\CMS\Http\Controllers\Setting\Logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

use Novay\CMS\Models\Logs\Requests;
use Novay\CMS\Tables\Logs\RequestTable;

class RequestController extends Controller
{
    protected $title, $prefix, $view;
    protected $data, $table;

    public function __construct()
    {
        $this->title = ___('Request Log');

        $this->data = new Requests;
        $this->table = new RequestTable;
        
        $this->prefix = 'cms::settings.logs.requests';
        $this->view = 'cms::settings.logs.requests';

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
