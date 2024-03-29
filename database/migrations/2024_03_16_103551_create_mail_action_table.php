<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailActionTable extends Migration
{
    public function up(): void
    {
        Schema::create('mail_action', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_id')->constrained('mail')->onDelete('cascade');
            $table->string('action');
            $table->text('description')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mail_action');
    }
}
