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
        Schema::create('school_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_fk_id');
            $table->string('firstname');
            $table->string('middle_name')->nullable();
            $table->string('lastname');
            $table->string('gender');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('dob');
            $table->string('role');
            $table->string('sub_role')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_employees');
    }
};
