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
        Schema::create('script_writers_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // ID of the script writer
            $table->decimal('amount', 10, 0);
            $table->string('transaction_id')->nullable(); // Will be used as reference for the payments.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('script_writers_payments');
    }
};
