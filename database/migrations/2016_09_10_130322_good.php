<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Good extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('名字');
            $table->text('desc')->comment('描述');
            $table->string('surface', 255)->default('')->comment('封面图');
            $table->tinyInteger('status')->default('1')->comment('状态，0-删除，1-在卖，2-下架');
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
        Schema::drop('good');
    }
}
