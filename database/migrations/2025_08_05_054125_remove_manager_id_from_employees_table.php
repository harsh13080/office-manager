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
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['manager_id']); // Drop foreign key first (if exists)
            $table->dropColumn('manager_id');    // Then drop the column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_id')->nullable();

            // If you want to restore foreign key constraint:
            $table->foreign('manager_id')->references('id')->on('employees')->onDelete('set null');
        });
    }
};
