<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('education_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_id');
            $table->foreignId('skill_id');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('education_skill');
    }
};
