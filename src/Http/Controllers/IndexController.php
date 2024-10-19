<?php

namespace Novay\CMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view("cms::index");
    }

    public function about(Request $request)
    {
        return view("cms::systems.about");
    }
}