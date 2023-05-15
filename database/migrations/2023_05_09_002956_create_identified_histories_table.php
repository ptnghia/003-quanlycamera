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
        Schema::create('identified_histories', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->foreignId('identified_id')->constrained('identifieds');
            $table->dateTime('time_get');
            $table->foreignId('camera_id')->constrained('cameras');
            $table->string('screen_image')->nullable();
            $table->string('crop_url')->nullable();
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
        Schema::dropIfExists('identified_histories');
    }
};
