<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertAddClassificationIdToGood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('good', function (Blueprint $table) {
            $table->integer('classification_id')->default('0')->comment('所属分类ID')->after('surface');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('good', function (Blueprint $table) {
            $table->dropColumn('classification_id');
        });
    }
}
