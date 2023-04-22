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
            $table->string('name');
            $table->string('image')->nullable();
           
            
            $table->foreignId('identified_id')->constrained('identifieds');
            
            $table->foreignId('category_id')->constrained('categories');
           
            
            $table->dateTime('time_get');
            
            $table->foreignId('camera_id')->constrained('cameras');
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
        Schema::dropIfExists('identified_histories');
    }
};
