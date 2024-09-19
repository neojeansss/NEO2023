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
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_provider_id');
            $table->foreign('payment_provider_id')->references('id')->on('payment_providers')->onDelete('cascade');
            $table->string('name');
            $table->string('account_name');
            $table->string('account_number');
            $table->integer('amount');
            $table->string('proof');
            $table->string('pick_up_system')->default('onsite');
            $table->longText('address')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandises');
    }
};
