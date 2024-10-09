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
            $table->string('firstname')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('role_fk_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->timestamp('last_active_at')->nullable();
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('role_fk_id')->references('id')->on('user_roles')->onDelete('cascade');
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
