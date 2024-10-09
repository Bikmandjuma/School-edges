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
        Schema::create('allow_customer_to_regiters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_partial_reg_fk_id');
            $table->foreign('customer_partial_reg_fk_id')->references('id')->on('customer_partial_registers')->onDelete('cascade');
            $table->string('status');
            $table->string('registration_done')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allow_customer_to_regiters');
    }
};
