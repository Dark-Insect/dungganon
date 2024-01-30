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
        Schema::create('loan_request', function (Blueprint $table) {
            $table->id('loan_id');

            // Foriegn ID
            $table->foreignId('user_id')->nullable();
            $table->foreignId("loan_approved_by_user_id")->nullable();

            // Loan Detail
            $table->integer("loan_amount")->nullable();
            $table->integer("loan_weekly_earn")->nullable();
            $table->string("loan_purpose")->nullable();
            $table->float("loan_term")->nullable();

            // Loan Status and Type
            $table->string("loan_cycle_type")->nullable();
            $table->string("loan_approved")->nullable();
            $table->string("loan_status")->nullable();

            // Loan Comment
            $table->string('loan_admin_recommendation')->nullable();

            // Document Name
            $table->string("loan_uploaded_name")->nullable();

            // Time Stamp
            $table->date("loan_request_date")->nullable();
            $table->timestamps();


            // id
            // loan_user_id //
            // loan_amount //amount to borrow
            // loan_weekly_earn //everweek earning
            // loan_purpose //purpose
            // loan_term //duration of loan
            // loan_cycle_type //cycle type
            // loan_approved //either the loan is approved or not
            // loan_status //either it is fully paid or not
            // loan_request_date //
            // loan_approved_by_user_id //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_loan__request');
    }
};
