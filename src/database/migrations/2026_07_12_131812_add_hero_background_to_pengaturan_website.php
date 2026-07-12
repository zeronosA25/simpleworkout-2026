<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaturan_website', function (Blueprint $table) {
            $table->string('hero_background_url')->nullable()->after('hero_subtitle');
        });
    }

    public function down(): void
    {
        Schema::table('pengaturan_website', function (Blueprint $table) {
            $table->dropColumn('hero_background_url');
        });
    }
};
