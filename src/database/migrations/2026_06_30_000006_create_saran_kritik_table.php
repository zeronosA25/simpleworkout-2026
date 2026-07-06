<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saran_kritik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('kategori', ['Teknis', 'Kritik Video/Deskripsi', 'Saran Gerakan Baru']);
            $table->text('pesan');
            $table->enum('status', ['Pending', 'On-Progress', 'Resolved'])->default('Pending');
            $table->text('balasan_admin')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saran_kritik');
    }
};
