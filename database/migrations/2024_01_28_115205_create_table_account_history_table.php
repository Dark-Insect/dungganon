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
        Schema::create('account_history', function (Blueprint $table) {
            $table->id('history_id');
            $table->foreignId('user_id');
            $table->foreignId('teller_id');
            $table->foreignId('loan_id');
            $table->float('balance');
            $table->float('interest');
            $table->float('amount_pay');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_account_history');
    }
};
