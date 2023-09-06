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
        Schema::table('pasiens', function (Blueprint $table) {
            $table->foreignId('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreignId('penjamin_id')->references('id')->on('penjamins')->onDelete('cascade');
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropColumn('dokter_id');
            $table->dropColumn('penjamin_id');
            $table->dropColumn('room_id');
        });
    }
};
