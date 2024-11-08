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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('main_lang')->default(config('app.locale'));
            $table->foreignId('translate_id')->nullable()->constrained('addresses', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('line_1');
            $table->string('line_2');
            $table->string('line_3');
            $table->string('zipcode')->nullable();
            $table->decimal('longitute');
            $table->decimal('latitude');
            $table->foreignId('country_id')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('state_id')->constrained('states')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('area_id')->constrained('areas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('address_type_id')->constrained('address_types')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreignId('owner_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('owner_type');
            $table->string('email');
            $table->string('phone_number');
            $table->text('url');

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
        Schema::dropIfExists('addresses');
    }
};
