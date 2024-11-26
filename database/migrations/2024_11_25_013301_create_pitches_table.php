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
        //------ Pitche table ----
        Schema::create('pitches', function (Blueprint $table) {
            $table->id();             
            $table->foreignId('stadium_id')->constrained('stadiums')->onDelete('cascade');
            $table->timestamps();
        });

        //------ Pitches Translation table ----
        Schema::create('pitche_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['pitche_id', 'locale']);
            $table->foreignId('pitche_id')->constrained('pitches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitches');
        Schema::dropIfExists('pitche_translations');
    }
};
