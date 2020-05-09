<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('male_id')
                ->references('id')
                ->on('birds')
                ->onDelete('restrict');
            $table->foreignId('female_id')
                ->references('id')
                ->on('birds')
                ->onDelete('restrict');
            $table->foreignId('cage_id')
                ->references('id')
                ->on('cages')
                ->onDelete('restrict');
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
        Schema::dropIfExists('pairs');
    }
}
