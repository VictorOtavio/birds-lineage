<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birds', function (Blueprint $table) {
            $table->id();
            $table->string('band')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->string('name');
            $table->foreignId('father_id')
                ->nullable()
                ->references('id')
                ->on('birds')
                ->onDelete('set null');
            $table->foreignId('mother_id')
                ->nullable()
                ->references('id')
                ->on('birds')
                ->onDelete('set null');
            $table->date('birth');
            $table->date('end')->nullable();
            $table->string('end_desc')->default('');
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
        Schema::dropIfExists('birds');
    }
}
