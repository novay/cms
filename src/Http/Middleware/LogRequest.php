<?php

namespace Novay\CMS\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogRequest
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response->status() === 404) {
            if (!\App::runningUnitTests()) {
                \Novay\CMS\Models\Logs\Requests::add();
            }
        }

        return $response;
    }
}
