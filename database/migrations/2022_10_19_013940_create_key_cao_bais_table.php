<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyCaoBaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_cao_bais', function (Blueprint $table) {
            $table->id();
            $table->string('tien_to')->nullable();
            $table->string('Key_cha')->nullable();
            $table->string('hau_to')->nullable();
            $table->string('Key_cha1')->nullable();
            $table->string('Key_cha2')->nullable();
            $table->string('Key_cha3')->nullable();
            $table->string('Key_cha4')->nullable();
            $table->string('topview')->nullable();
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
        Schema::dropIfExists('key_cao_bais');
    }
}
