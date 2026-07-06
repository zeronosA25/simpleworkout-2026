<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hari_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_jadwal_id')->constrained('template_jadwal')->cascadeOnDelete();
            $table->string('nama_hari');
            $table->integer('urutan_hari');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hari_jadwal');
    }
};
