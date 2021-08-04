<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name_arabic');
            $table->string('name_english');
            $table->string('description_arabic')->nullable();
            $table->string('description_english')->nullable();
            $table->timestamps();
        });

          // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade'); // user type admin 
            $table->foreignId('role_id')->constrained('roles')->onUpdate('cascade')->onDelete('cascade');     

            $table->primary(['user_id', 'role_id']);
        });

         // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name_arabic');
            $table->string('name_english');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('permission_id')->constrained('permissions')->onUpdate('cascade')->onDelete('cascade');     
            $table->foreignId('role_id')->constrained('roles')->onUpdate('cascade')->onDelete('cascade');     
            $table->primary(['permission_id', 'role_id']);
        });



        // // Create table for associating permissions to roles (Many-to-Many)
        // Schema::create('permission_user', function (Blueprint $table) {
        //     $table->foreignId('permission_id')->constrained('permissions')->onUpdate('cascade')->onDelete('cascade');     
        //     $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');     
        //     $table->primary(['permission_id', 'user_id']);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
    }
}
