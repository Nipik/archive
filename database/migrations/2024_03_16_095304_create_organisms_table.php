<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganismsTable extends Migration
{
    public function up(): void
    {
        Schema::create('organisms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('fax')->nullable();
            $table->string('tel')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organisms');
    }
}
