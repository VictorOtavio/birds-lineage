<?php

use App\Enums\BirdOriginType;
use App\Enums\BirdSexType;
use App\Enums\BirdStatusType;
use App\Enums\BirdSubStatusType;
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
            $table->string('identifier');
            $table->string('band')->unique()->nullable();
            $table->enum('gender', BirdSexType::getValues())->default(BirdSexType::Unknown);
            $table->date('hatch_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', BirdStatusType::getValues())->default(BirdStatusType::Available);
            $table->enum('sub_status', BirdSubStatusType::getValues())->default(BirdSubStatusType::Reproduction);
            $table->string('species')->nullable();
            $table->foreignId('father_id')->constrained('birds')->nullable();
            $table->foreignId('mother_id')->constrained('birds')->nullable();
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
