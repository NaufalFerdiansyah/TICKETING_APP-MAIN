<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Add location_id column
            $table->unsignedBigInteger('location_id')->nullable()->after('tanggal_waktu');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
            
            // Drop the old lokasi column
            $table->dropColumn('lokasi');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Restore the old lokasi column
            $table->string('lokasi')->nullable();
            
            // Drop the foreign key and location_id column
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
        });
    }
};
