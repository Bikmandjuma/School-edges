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
        Schema::create('customer_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_fk_id');
            $table->Text('message');
            $table->timestamp('time_msg_sent');
            $table->unsignedBigInteger('share_holders_fk_id')->nullable();
            $table->Text('reply_msg')->nullable();
            $table->timestamp('time_msg_replied')->nullable();
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('share_holders_fk_id')->references('id')->on('share_holders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_questions');
    }
};
