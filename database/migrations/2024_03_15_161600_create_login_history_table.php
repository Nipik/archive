<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginHistoryTable extends Migration
{
    public function up(): void
    {
        Schema::create('login_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('connection_id')->nullable();
            $table->timestamp('login_time');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->string('session_token')->nullable();
            $table->string('login_result');
            $table->string('login_method');
            $table->string('auth_provider')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_os')->nullable();
            $table->string('location')->nullable();
            $table->string('session_duration')->nullable();
            $table->boolean('security_flag')->default(false);
            $table->timestamps();
        });
    } 

    public function down(): void
    {
        Schema::dropIfExists('login_history');
    }
}
