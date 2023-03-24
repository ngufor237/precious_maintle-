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
        Schema::create('script_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('script_writer_id'); // Will contain user id of the person who uploads the script
            $table->string('document_script_name');
            $table->string('script_title');
            $table->text('script_synopsis');
            $table->integer('script_genre'); // Will contain the id of the genre of the script
            $table->string('script_tagline');
            $table->string('script_sub_genre')->nullable();
            $table->string('script_target_audience');
            $table->integer('script_no_locations');
            $table->json('script_suggested_cast')->nullable();
            $table->text('poster_image')->nullable();
            $table->boolean('is_bought')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('script_collections');
    }
};
