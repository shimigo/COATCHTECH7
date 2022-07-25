<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{

    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('shop_id')->constrained();
            $table->unsignedtinyInteger('users_number');
            $table->date('reserve_date');
            $table->time('reserve_time');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
