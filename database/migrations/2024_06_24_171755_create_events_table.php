<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')
                ->nullable()
                ->constrained('venues')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('name');
            $table->string('poster');
            $table->date('event_date');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
