<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hari_jadwal_id')->constrained('hari_jadwal')->cascadeOnDelete();
            $table->foreignId('gerakan_id')->constrained('workouts')->cascadeOnDelete();
            $table->integer('urutan_gerakan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_jadwal');
    }
};
