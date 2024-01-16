<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $master = [
            'title' => 'Activity Log',
            'activities' => ActivityLog::orderBy('created_at', 'desc')->limit(10)->get(),
        ];
        return inertia()->render('superadmin/activity_log', compact('master'));
    }
}
