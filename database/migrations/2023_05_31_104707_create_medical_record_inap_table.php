<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MedicalRecord;

class CreateMedicalRecordInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_record_inap', function (Blueprint $table) {
            $table->id();
            // $table->integer("medical_record_id");
            $table->foreignIdFor(MedicalRecord::class);
            $table->text("physical_test");
            $table->integer("doctor_id");
            $table->integer("patient_id");
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
        Schema::dropIfExists('medical_record_inap');
    }
}
