<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('template_jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_template');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah_hari_per_minggu')->default(7);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_jadwal');
    }
};
