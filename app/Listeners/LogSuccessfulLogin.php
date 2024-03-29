<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginHistory;
use Jenssegers\Agent\Agent;

class LogSuccessfulLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Créer une instance de la classe Agent
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

        // Déterminer le système d'exploitation
        $os = $agent->platform();

        // Récupérer l'adresse IP de la requête, si disponible
        $ipAddress = request()->ip();

        // Enregistrer les informations dans la base de données
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
