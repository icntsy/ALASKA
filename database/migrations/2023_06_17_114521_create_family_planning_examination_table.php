<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyPlanningExaminationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_planning_examination', function (Blueprint $table) {
            $table->id();
            $table->foreignId('familyplanning_id')->constrained('familyplannings');
            $table->date('arrival_date');
            $table->string('body_weight');
            $table->string('blood_pressure');
            $table->date('return_date');
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
        Schema::dropIfExists('family_planning_examination');
    }
}
