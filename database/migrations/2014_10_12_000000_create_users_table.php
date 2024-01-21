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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('civil_status');
            $table->string('gender');
            $table->string('religion');
            $table->string('education_attainment');
            $table->string('phone');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_pic');

            // Address
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('no_of_years');

            // Mother
            $table->string('mother_first_name');
            $table->string('mother_middle_name');
            $table->string('mother_last_name');
            $table->string('mother_other_information');

            // Husband/Spouse
            $table->string('hs_first_name');
            $table->string('hs_middle_name');
            $table->string('hs_last_name');
            $table->string('hs_extension');
            $table->date('hs_date_of_birth');
            $table->string('client_source_income');
            $table->string('hs_source_income');
            $table->string('total_income');
            $table->string('total_ppi_score');

            $table->string('password');
            $table->boolean('is_active');
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
