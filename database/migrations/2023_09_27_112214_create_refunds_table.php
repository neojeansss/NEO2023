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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
            $table->unsignedBigInteger('payment_provider_id');
            $table->string('payment_method');
            $table->string('account_name');
            $table->string('account_number');
            $table->integer('payment_amount');
            $table->string('payment_proof');
            $table->string('bank_name');
            $table->string('dest_account_name');
            $table->string('dest_account_number');
            $table->string('proof')->nullable();
            $table->boolean('is_verified')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
