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
            $table->id();
            $table->string('username')->nullable(); // set to nullable becauses maybe the amin may not need a username
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->text('profile_pic_url')->nullable();
            $table->integer('role_id')->nullable(); // will contain the id of the role of the user
            $table->integer('script_writer_id')->nullable(); // will contain the id of the script writer of the user or defualt to null for to other users
            $table->boolean('is_active')->default(true); // can be used to deactivate and activate a user account
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
