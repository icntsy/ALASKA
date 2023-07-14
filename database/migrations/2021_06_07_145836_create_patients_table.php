<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik')->unique()->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->date('birth_date');
            $table->text('address');
            $table->string('profession');
            $table->enum('study', ['Tidak Sekolah','SD', 'SMP', 'SMA', 'Perguruan Tinggi']);
            $table->enum('blood_type', ['A','B', 'AB', 'O', 'Tidak Tahu']);
            $table->string('phone_number')->nullable();
            $table->text('allergy')->nullable();
            $table->string('no_rekam_medis')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
}
