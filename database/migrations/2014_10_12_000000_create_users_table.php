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

            // Personal Information
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('education_attainment')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_pic')->nullable();

            // Address
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('no_of_years')->nullable();

            // Mother
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_other_information')->nullable();

            // Husband/Spouse
            $table->string('hs_first_name')->nullable();
            $table->string('hs_middle_name')->nullable();
            $table->string('hs_last_name')->nullable();
            $table->string('hs_extension')->nullable();
            $table->date('hs_date_of_birth')->nullable();
            $table->string('client_source_income');
            $table->string('hs_source_income')->nullable();
            $table->string('total_income')->nullable();
            $table->string('total_ppi_score')->nullable();

            $table->string('password');
            $table->boolean('is_active');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_archived')->default(false);
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
