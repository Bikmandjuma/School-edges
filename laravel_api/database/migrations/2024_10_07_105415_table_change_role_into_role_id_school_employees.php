<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('school_employees', function (Blueprint $table) {
            DB::statement("ALTER TABLE `school_employees` CHANGE `role` `role_fk_id` INT(11)");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_employees', function (Blueprint $table) {
            //
        });
    }
};
