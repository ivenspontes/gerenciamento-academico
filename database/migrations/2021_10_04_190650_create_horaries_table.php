<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horaries', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('SET NULL');

            $table->unsignedBigInteger('discipline_id')->nullable();
            $table->foreign('discipline_id')
                ->references('id')->on('disciplines')
                ->onDelete('SET NULL');

            $table->unsignedBigInteger('grid_id')->nullable();
            $table->foreign('grid_id')
                ->references('id')->on('grids')
                ->onDelete('SET NULL');

            $table->string('weekday');
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('horaries');
    }
}
