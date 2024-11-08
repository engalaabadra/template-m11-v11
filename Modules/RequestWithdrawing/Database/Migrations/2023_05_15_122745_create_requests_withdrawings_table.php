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
        Schema::create('requests_withdrawing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained('wallets')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('amount')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->date('deleted_at')->nullable();
            $table->tinyInteger('active')->default(1);//0:inactive 1:active 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets_calls');
    }
};
