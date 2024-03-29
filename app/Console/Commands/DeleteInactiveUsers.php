<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteInactiveUsers extends Command
{
    protected $signature = 'app:delete-inactive-users';
    protected $description = 'Supprime les utilisateurs inactifs';

    public function handle()
    {
        $thresholdDate = Carbon::now()->subDays(30);

        $inactiveUsers = User::where('created_at', '<=', $thresholdDate)
            ->get();

        foreach ($inactiveUsers as $user) {
            $user->delete();
            $this->info("Utilisateur #$user->id supprimé");
        }

        $this->info('Suppression des utilisateurs inactifs terminée.');
    }
}
