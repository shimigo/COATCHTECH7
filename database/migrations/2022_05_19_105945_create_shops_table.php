<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{

    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('shop_name');
            $table->text('shop_info');
            $table->string('shop_img');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
