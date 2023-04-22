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
        Schema::create('identified_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            
            
            $table->foreignId('identified_id')->constrained('identifieds');
            
            $table->foreignId('category_id')->constrained('categories');
            $table->dateTime('time_get');
            $table->text('note')->nullable();
            $table->string('image')->nullable();
           
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
        Schema::dropIfExists('identified_lists');
    }
};
