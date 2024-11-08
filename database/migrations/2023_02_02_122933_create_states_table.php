<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('main_lang')->default(config('app.locale'));
            $table->foreignId('translate_id')->nullable()->constrained('states')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name',225);
            $table->foreignId('city_id')->constrained('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('code');
            $table->tinyInteger('active')->default(1);//0:inactive 1:active 
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
