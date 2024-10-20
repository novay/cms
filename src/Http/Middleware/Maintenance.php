<?php

namespace Novay\CMS\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class Maintenance
{
    protected $request, $app;

    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
    }

    public function handle($request, Closure $next) {
        if(settings()->group('cms')->get('maintenance', 0) == 1):
            return response()->make(view('theme::errors.maintenance'), 503);
        endif;
        return $next($request);
    }
}
