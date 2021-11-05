<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnWeekIdTableHoraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horaries', function (Blueprint $table) {
            $table->unsignedBigInteger('week_id')->nullable();
            $table->foreign('week_id')
                ->references('id')->on('weeks')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horaries', function (Blueprint $table) {
            $table->dropColumn('week_id');
        });
    }
}
