<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Patient;

class CreateGravidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gravida', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Patient::class);
            $table->integer('patien_id');
            $table->integer('bidan_id');
            $table->string('hpl');
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
        Schema::dropIfExists('gravida');
    }
}
