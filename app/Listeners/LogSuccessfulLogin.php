<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginHistory;
use Jenssegers\Agent\Agent;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $agent = new Agent();
        if ($agent->isDesktop()) {
            $deviceType = 'Desktop';
        } elseif ($agent->isMobile()) {
            $deviceType = 'Mobile';
        } elseif ($agent->isTablet()) {
            $deviceType = 'Tablet';
        } else {
            $deviceType = 'Unknown';
        }
        $os = $agent->platform();
        $ipAddress = request()->ip();
        LoginHistory::create([
            'user_id' => $event->user->id,
            'login_time' => now(),
            'ip_address' => $ipAddress,
            'user_agent' => request()->userAgent(),
            'login_result' => 'success',
            'login_method' => 'email',
            'device_type' => $deviceType,
            'device_os' => $os,
        ]);
    }
}
