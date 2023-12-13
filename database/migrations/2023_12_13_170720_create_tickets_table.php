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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->decimal('price', 6, 2);
            $table->string('status', 50);
            $table->unsignedBigInteger('ID_EVENT');
            $table->string('name', 50);
            $table->integer('quantity');
            $table->string('code', 50);

            $table->timestamps();

            // Cheie straina:
            $table->foreign('ID_EVENT')->references('ID')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
