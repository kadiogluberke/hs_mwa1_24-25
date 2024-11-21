<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('link');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
