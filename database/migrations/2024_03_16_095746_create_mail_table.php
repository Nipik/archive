<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailTable extends Migration
{
    public function up(): void
    {
        Schema::create('mail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organism_id')->constrained()->onDelete('cascade');
            $table->string('subject');
            $table->string('status');
            $table->date('reception_date')->nullable();
            $table->date('dispatch_date')->nullable();
            $table->string('source');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mail');
    }
}
