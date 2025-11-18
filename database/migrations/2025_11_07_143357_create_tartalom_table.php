<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tartalom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suti_id')->constrained('suti')->onDelete('cascade');
            $table->string('mentes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tartalom');
    }
};