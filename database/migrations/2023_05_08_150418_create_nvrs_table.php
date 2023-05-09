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
            $table->string('serial',100)->nullable();
            $table->string('version',10)->nullable();
            //$table->string('camera_quantity')->nullable();
            $table->foreignId('area_id')->nullable()->constrained('areas');
            $table->string('ip',50)->nullable();
            $table->string('port',20);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('nvrs');
    }
};
