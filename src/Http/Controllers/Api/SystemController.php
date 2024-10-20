<?php

namespace Novay\CMS\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'success' => true, 
            'latest_update' => null, 
            'version' => 'v'.config('cms.version'), 
            'events_count' => \Novay\CMS\Models\Logs\Events::count(), 
            'requests_count' => \Novay\CMS\Models\Logs\Requests::count(), 
            'register_date' => date('F d, Y', strtotime('2022-01-01')), 
            'time' => now()->format('Y-m-d H:i A')
        ]);
    }
}