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
            $table->string('title');
            $table->text('content');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->time('timeStart');
            $table->time('timeEnd');
            $table->string('eventLink')->nullable();
            $table->string('image')->nullable();
            $table->date('dateAdded');
            $table->foreignId('location_id');
            $table->foreignId('type_id');
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->timestamps();
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
