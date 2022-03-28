<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tournament_id')->unsigned();
            $table->bigInteger('left_team_id')->unsigned();
            $table->bigInteger('right_team_id')->unsigned();
            $table->integer('margin')->unsigned();
            $table->float('left_coefficient');
            $table->float('right_coefficient');
            $table->boolean('is_draw_possible');
            $table->float('draw_coefficient')->nullable();
            $table->timestamp('starts_at');
            $table->tinyInteger('result')->nullable();
            $table->string('score')->nullable();
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
        Schema::dropIfExists('games');
    }
}
