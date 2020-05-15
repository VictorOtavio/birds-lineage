<?php

use App\Enums\BirdSexType;
use App\Enums\BirdOriginType;
use App\Enums\BirdStatusType;
use App\Enums\BirdSubStatusType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('identifier');
            $table->string('band')->unique()->nullable();
            $table->enum('sex', BirdSexType::getValues())->default(BirdSexType::Unknown);
            $table->date('hatch_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', BirdStatusType::getValues())->default(BirdStatusType::Available);
            $table->enum('sub_status', BirdSubStatusType::getValues())->default(BirdSubStatusType::Reproduction);
            $table->foreignId('cage_id')->nullable()->references('id')->on('cages')->onDelete('set null');
            $table->foreignId('species_id')->nullable()->references('id')->on('species')->onDelete('set null');
            $table->foreignId('father_id')->nullable()->references('id')->on('birds')->onDelete('set null');
            $table->foreignId('mother_id')->nullable()->references('id')->on('birds')->onDelete('set null');
            $table->enum('origin', BirdOriginType::getValues())->default(BirdOriginType::MyBreeding);
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
