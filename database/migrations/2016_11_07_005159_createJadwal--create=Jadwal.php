<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalCreate=Jadwal extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jadwal', fuction (Blueprint $table){
        $table->increments('id');
        $table->string('id_jadwal');
        $table->date('tanggal');
        $table->Bidan('bidan');
        $table->string('daftar_imunisasi');
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
        Schema::dropifExists('Jadwal');
        });
    }
}
