<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailCategoryTable extends Migration
{
    public function up(): void
    {
        Schema::create('mail_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_id')->constrained('mail')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mail_category');
    }
}
