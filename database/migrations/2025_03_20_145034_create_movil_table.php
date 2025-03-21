<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moviles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('gama_id');
            $table->integer('marca_id');
            $table->double('precio');
            $table->integer('almacenamiento');
            $table->integer('ram');
            $table->integer('bateria');
            $table->string('sistema_op');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movil');
    }
};
