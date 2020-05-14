<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('popular_name');
            $table->string('latin_name');
            $table->float('price', 10, 2);
            $table->integer('incubation');
            $table->integer('check_fertilized');
            $table->integer('leg_banding');
            $table->integer('nest_exit');
            $table->integer('weaned');
            $table->integer('sexual_maturity');
            $table->integer('egg_laying');
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
        Schema::dropIfExists('species');
    }
}
