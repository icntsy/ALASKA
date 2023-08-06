<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Queue;

class CreateDetailNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nota', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Queue::class);
            $table->string('ruangan');
            $table->string('assesment');
            $table->string('pendaftaran');
            $table->string('infus');
            $table->string('tindakan');
            $table->string('obat');
            $table->string('visite');
            $table->string('pulang');
            $table->string('ekg');
            $table->string('darah');
            $table->string('fisioterapi');
            $table->string('tambahan');
            $table->string('disk');
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
        Schema::dropIfExists('detail_nota');
    }
}
