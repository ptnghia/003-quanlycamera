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
        Schema::create('identifieds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('identified_type_id')->constrained('identified_types');
            $table->foreignId('identified_cate_id')->constrained('identified_cates');
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
        Schema::dropIfExists('identifieds');
    }
};
