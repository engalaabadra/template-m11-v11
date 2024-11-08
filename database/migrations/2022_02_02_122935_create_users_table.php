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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_lang')->default(config('app.locale'));
            $table->foreignId('translate_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('twitter_id')->nullable();
            $table->string('oauth_type')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->enum('active',['0','1'])->default('1');//0:inactive 1:active 
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
