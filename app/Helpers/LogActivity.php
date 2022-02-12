<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;
use App\Models\ActivityLog;

class LogActivity
{

    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['urls'] = Request::fullUrl();
        $log['methods'] = Request::method();
        $log['address'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        ActivityLog::create($log);
    }

    public static function logActivityLists()
    {
        return ActivityLog::latest()->get();
    }
}
