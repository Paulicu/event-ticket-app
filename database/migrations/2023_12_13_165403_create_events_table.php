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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('titlu', 50);
            $table->string('descriere', 200);
            $table->datetime('date');
            $table->string('contact', 50);
            $table->unsignedBigInteger('ID_PARTENER');
            $table->unsignedBigInteger('ID_SPONSOR');
            $table->string('locatie', 50);

            $table->timestamps();

            // Chei Straine:
            $table->foreign('ID_PARTENER')->references('id')->on('parteners');
            $table->foreign('ID_SPONSOR')->references('id')->on('sponsors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
