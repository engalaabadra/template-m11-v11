<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaratrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_lang')->default(config('app.locale'));
            $table->foreignId('translate_id')->nullable()->constrained('roles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->enum('active',['0','1'])->default('1');//0:inactive 1:active 
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('main_lang')->default(config('app.locale'));
            $table->foreignId('translate_id')->nullable()->constrained('permissions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->enum('active',['0','1'])->default('1');//0:inactive 1:active 
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users and teams (Many To Many Polymorphic)
        Schema::create('role_user', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id')->index(); // Index the user_id
            $table->unsignedBigInteger('role_id')->index(); // Index the role_id

            $table->string('user_type')->nullable();
            $table->nullableMorphs('context'); //  context_id and context_type fields
        
            // Define the foreign keys with cascading updates and deletes
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        // Create table for associating permissions to users (Many To Many Polymorphic)
        Schema::create('permission_user', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('permission_id')->index(); // Index the permission_id
            $table->unsignedBigInteger('user_id')->index(); // Index the user_id
            // Define the foreign keys with cascading updates and deletes
            $table->foreign('permission_id')
                ->references('id')->on('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('permission_id')->index(); // Index the permission_id
            $table->unsignedBigInteger('role_id')->index(); // Index the role_id
            // Define the foreign keys with cascading updates and deletes
            $table->foreign('permission_id')
                ->references('id')->on('permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
    }
}
