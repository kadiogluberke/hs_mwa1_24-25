<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('programme');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->string('location');
            $table->string('description');
            $table->string('grade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
