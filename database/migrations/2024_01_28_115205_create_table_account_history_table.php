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
            $table->float('principal')->nullable();
            $table->float('balance')->nullable();
            $table->float('interest')->nullable();
            $table->float('loan_amortization')->nullable();
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
