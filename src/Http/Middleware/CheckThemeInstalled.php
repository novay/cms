<?php

namespace Novay\CMS\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckThemeInstalled
{
    public function handle(Request $request, Closure $next)
    {
        $composerOutput = shell_exec('composer show nue-template/*-theme');

        if (empty($composerOutput)) {
            return redirect()->route('cms::index');
        }

        return $next($request);
    }
}
