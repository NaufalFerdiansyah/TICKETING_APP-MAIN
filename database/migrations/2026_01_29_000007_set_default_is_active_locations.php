<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Set all locations to active by default if they don't have a value
        DB::table('locations')
            ->whereNull('is_active')
            ->orWhere('is_active', '')
            ->update(['is_active' => 'Y']);
    }

    public function down(): void
    {
        // No rollback needed
    }
};
