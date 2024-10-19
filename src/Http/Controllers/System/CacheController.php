<?php

namespace Novay\CMS\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function index(Request $request)
    {
        return view("cms::systems.cache");
    }
}