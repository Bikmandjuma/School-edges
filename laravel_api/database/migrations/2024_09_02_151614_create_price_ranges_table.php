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
        Schema::create('price_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_fk_id');
            $table->foreign('period_fk_id')->references('id')->on('period_prices')->onDelete('cascade');
            $table->string('min_student');
            $table->string('max_student');
            $table->string('prices');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_ranges');
    }
};
