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
            $table->string('name');            
            $table->foreignId('area_id')->constrained('areas');         
            $table->foreignId('nvr_id')->constrained('nvrs');
            $table->string('IP',50)->nullable();
            $table->string('link',100)->nullable();
            $table->integer('status');
            $table->text('note')->nullable();
            
            $table->foreignId('user_id')->nullable()->constrained('users');
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
