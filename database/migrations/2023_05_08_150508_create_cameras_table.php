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
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('name_area')->nullable();  
            $table->string('speed',200)->nullable();                 
            $table->foreignId('nvr_id')->constrained('nvrs');
            $table->string('ip',50)->nullable();
            $table->string('link',100)->nullable();
            $table->integer('status')->default(1);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('cameras');
    }
};
