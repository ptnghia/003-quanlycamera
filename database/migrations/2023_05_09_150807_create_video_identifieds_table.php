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
        Schema::create('video_identifieds', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->foreignId('video_id')->constrained('videos');
            $table->foreignId('identifieds_id')->constrained('identifieds');
            $table->dateTime('time_get');
            $table->string('screen_image')->nullable();
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
        Schema::dropIfExists('video_identifieds');
    }
};
