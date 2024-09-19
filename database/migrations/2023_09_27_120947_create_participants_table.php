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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('registration_detail_id');
            $table->foreign('registration_detail_id')->references('id')->on('registration_details')->onDelete('cascade');
            $table->string('institution');
            $table->string('university_year');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->longText('address')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            // $table->unsignedBigInteger('province_id')->nullable();
            // $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            // $table->unsignedBigInteger('district_id')->nullable();
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('allergy')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_official')->default(true);
            $table->string('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
