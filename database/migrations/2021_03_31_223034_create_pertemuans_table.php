<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->integer('tapel_id');
            $table->integer('kelas_id');
            $table->string('mapel');
            $table->integer('pertemuan_ke');
            $table->string('pembahasan')->nullable();
            $table->integer('status')->nullable();
            $table->string('code')->nullable();
            $table->dateTime('data_expired')->nullable();
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
        Schema::dropIfExists('pertemuans');
    }
}
