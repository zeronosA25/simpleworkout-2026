<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan_website', function (Blueprint $table) {
            $table->id();
            $table->string('nama_website')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('nomor_whatsapp_admin')->nullable();
            $table->string('email_admin')->nullable();
            $table->text('alamat_fisik')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->text('deskripsi_singkat_website')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan_website');
    }
};
