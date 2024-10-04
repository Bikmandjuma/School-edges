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
        Schema::create('school_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_fk_id');
            $table->string('firstname');
            $table->string('middle_name')->nullable();
            $table->string('lastname');
            $table->string('gender');
            $table->string('dob');
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('father_names')->nullable();
            $table->string('father_phone')->unique()->nullable();
            $table->string('mather_names')->nullable();
            $table->string('mather_phone')->unique()->nullable();
            $table->string('guardian_names')->nullable();
            $table->string('guardian_phone')->unique()->nullable();
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
        Schema::dropIfExists('school_students');
    }
};
