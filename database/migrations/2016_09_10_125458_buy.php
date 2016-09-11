<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Buy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name', 20)->default('')->comment('顾问姓名');
            $table->string('phone', 20)->default('')->comment('手机号码');
            $table->string('address', 255)->default('')->comment('手机号码');
            $table->text('feedback')->comment('买家留言');
            $table->integer('good_id')->default('0')->comment('商品ID');
            $table->integer('production_id')->default('0')->comment('产品ID');
            $table->integer('size_id')->default('0')->comment('型号ID');
            $table->tinyInteger('status')->default('0')->comment('状态，0-删除，1-刚下的订单，2-已配送，3-已完成');
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
        Schema::drop('buy');
    }
}
