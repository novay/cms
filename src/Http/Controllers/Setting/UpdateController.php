<?php

namespace Novay\CMS\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use ZipArchive;

class UpdateController extends Controller
{
    protected $title, $prefix, $view;
    protected $host, $key;

    public function __construct()
    {
        $this->title = ___('System Update');

        $this->host = config('app.host');
        $this->key = config('app.license_key');
        
        $this->prefix = 'cms::settings.updates';
        $this->view = 'cms::settings.updates';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    public function index(Request $request)
    {
        $plugins = null;
        $error_message = null;

        if($request->filled('purpose')):
            if($request->purpose == 'content'):
                try {
                    $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ])->timeout(10)
                    ->get("https://cms.btekno.id/api/update", [
                        'host' => $this->host,
                        'license' => $this->key
                    ]);
        
                    if ($response->successful()) {
                        $plugins = $response->json();
                    } else {
                        $plugins = null;
                        $error_message = "Tidak terhubung ke Server CMS.";
                    }
                } catch (\Exception $e) {
                    $plugins = null;
                    $error_message = "Tidak terhubung ke Server CMS.";
                }
            endif;
        endif;

        return view("{$this->view}.index", compact('plugins', 'error_message'));
    }

    public function store(Request $request)
    {
        if(!$request->has('plugin')):
            return abort(404);
        endif;

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->timeout(10)
            ->get("https://cms.btekno.id/api/update", [
                'host' => $this->host,
                'license' => $this->key
            ]);

            if ($response->successful()) {
                $plugins = $response->json();
            } else {
                $plugins = null;
                $error_message = "Tidak terhubung ke Server CMS.";
            }
        } catch (\Exception $e) {
            $plugins = null;
            $error_message = "Tidak terhubung ke Server CMS.";
        }

        if(!is_null($plugins)):
            foreach($plugins['plugins'] as $plugin):
                if($plugin['slug'] == $request->plugin):
                    $file = file_get_contents('https://epanel.btekno.id/'.$plugin['zip']);
                    File::put(storage_path('app/plugin-'.$plugin['slug'].'.zip'), $file);
                    
                    $zip = new ZipArchive;
                    $res = $zip->open(storage_path('app/plugin-'.$plugin['slug'].'.zip'));
                    if($res === TRUE):
                        $zip->extractTo(base_path('Modules'));
                        $zip->close();
    
                        notify()->flash($plugin['name'] . ' berhasil diupdate!', 'success');
                    else:
                        notify()->flash($plugin['name'] . ' gagal diupdate!', 'error');
                    endif;
    
                    File::delete(storage_path('app/plugin-'.$plugin['slug'].'.zip'));
                    return redirect()->back();
                endif;
            endforeach;
        endif;
        
        return abort(404);
    }
}
