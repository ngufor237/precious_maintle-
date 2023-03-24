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
        Schema::create('script_writers', function (Blueprint $table) {
            $table->id();
            $table->Date('date_of_birth');
            $table->integer('age');
            $table->string('City');
            $table->string('gender');
            $table->text('bio')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('script_writers');
    }
};
