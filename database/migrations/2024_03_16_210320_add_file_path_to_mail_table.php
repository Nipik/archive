<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilePathToMailTable extends Migration
{
    public function up()
    {
        Schema::table('mail', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('mail', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }
}