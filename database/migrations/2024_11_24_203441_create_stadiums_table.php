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
        //------ Stadiums table ----
        Schema::create('stadiums', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        //------ Stadiums Translation table ----
        Schema::create('stadium_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['stadium_id', 'locale']);
            $table->foreignId('stadium_id')->constrained('stadiums')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadiums');
        Schema::dropIfExists('stadium_translations');
    }
};
