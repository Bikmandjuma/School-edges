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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('dob');
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('role_id'); // Remove ->change()
            $table->string('username')->unique();
            $table->string('password');
            $table->string('image');
            
            // Comment out the foreign key constraint for now
            // $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');
            
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
