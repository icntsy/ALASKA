<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Drug;
use App\Models\Pregnantmom;

class CreateDrugBidanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_bidan', function (Blueprint $table) {
            $table->id();
            $table->integer('pregnantmom_id');
            $table->integer("drug_id");
            $table->integer('quantity')->default(0);
            $table->string('instruction');
            $table->string('harga');
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
        Schema::dropIfExists('drug_bidan');
    }
}
