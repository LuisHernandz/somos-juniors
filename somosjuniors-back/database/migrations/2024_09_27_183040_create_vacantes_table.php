<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('puesto', 60);
            $table->text('descripcion');
            $table->text('foto');
            $table->integer('vacD');
            $table->integer('vacO');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacantes');
    }
};
