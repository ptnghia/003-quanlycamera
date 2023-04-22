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
        Schema::create('nvrs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial')->nullable();
            $table->string('version',10)->nullable();
            $table->string('camera_quantity')->nullable();
            
           
            $table->string('IP',50);
            $table->string('link',100);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('nvrs');
    }
};
