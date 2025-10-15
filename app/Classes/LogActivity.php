<?php

namespace Classes;

use App\Models\LogActivity as LogActivityModel;


class LogActivity
{
    public static function addToLog($subject, $user = null)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['json'] = json_encode(request()->all());
        $log['url'] = request()->fullUrl();
        $log['method'] = request()->method();
        $log['ip'] = request()->ip();
        $log['agent'] = request()->header('user-agent');
        $log['user_id'] = ($user) ? $user->id : (auth()->check() ? auth()->user()->id : 1);
        LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }
}
