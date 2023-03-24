<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**A
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scripts_boughts', function (Blueprint $table) {
            $table->id();
            $table->integer('script_id');
            $table->integer('user_id');
            $table->decimal('amount', 10, 0);
            $table->timestamps(); // Since the table already contain created_at, No need to add date as per the design
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scripts_boughts');
    }
};
