<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoodView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_view', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('good_id')->default('0')->comment('商品ID');
            $table->string('ip', 20)->default('')->comment('浏览IP');
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
        Schema::drop('good_view');
    }
}
