<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suti_id')->constrained('suti')->onDelete('cascade');
            $table->integer('ertek');
            $table->string('egyseg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ar');
    }
};