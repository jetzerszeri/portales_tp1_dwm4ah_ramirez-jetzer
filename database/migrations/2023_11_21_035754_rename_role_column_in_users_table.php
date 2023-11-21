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
        // Schema::table('users', function (Blueprint $table) {
        //     $table->renameColumn('role', 'role_id');
        // });
        DB::statement('ALTER TABLE users CHANGE role role_id INT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->renameColumn('role', 'role_id');
        // });
        DB::statement('ALTER TABLE users CHANGE role role_id INT');
    }
};
