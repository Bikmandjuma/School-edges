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
        Schema::create('new_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_fk_id');
            $table->string('Title')->nullable();
            $table->Text('Content')->nullable();
            $table->string('Images')->nullable();
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_contents');
    }
};
