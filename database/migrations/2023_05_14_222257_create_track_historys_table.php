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
        Schema::create('track_historys', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('note');
            $table->dateTime('time_get');
            $table->integer('camera_id')->default(0);
            $table->string('cam_name');
            $table->string('khuvuc');
            $table->text('crop_url')->nullable();
            $table->text('general_url')->nullable();
            $table->text('loss_url')->nullable();
            $table->integer('alert_type')->default(0);
            $table->integer('type')->default(0);
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
        Schema::dropIfExists('track_historys');
    }
};
