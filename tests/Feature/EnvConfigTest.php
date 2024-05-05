<?php

namespace Tests\Feature;

use Tests\TestCase;
class EnvConfigTest extends TestCase
{
    public function test_app_name()
    {
        $appName = config('app.name');
        $this->assertEquals('Laravel', $appName, 'Le nom de l\'application doit être Laravel');
    }

    public function test_app_env()
    {
        $appEnv = config('app.env');
        $this->assertEquals('testing', $appEnv, 'L\'environnement de l\'application doit être testing');
    }

    public function test_db_connection()
    {
        $dbConnection = config('database.default');
        $this->assertEquals('mysql', $dbConnection, 'La connexion de base de données par défaut doit être mysql');
    }

    public function test_mail_host()
    {
        $mailHost = config('mail.mailers.smtp.host');
        $this->assertEquals('smtp.gmail.com', $mailHost, 'Le serveur SMTP doit être smtp.gmail.com');
    }

    public function test_analytics_property_id()
    {
        $analyticsPropertyId = config('services.analytics.property_id');
        $this->assertNotNull($analyticsPropertyId, 'L\'ID de la propriété Analytics doit être défini dans le fichier .env');
        $this->assertEquals('433295911', $analyticsPropertyId, 'L\'ID de la propriété Analytics doit être 433295911');
    }

}
