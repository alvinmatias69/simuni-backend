<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BayiMigrationCreate=bayi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bayi', function (Blueprint $table){
            $table->string('nama_bayi');
            $table->string('id_bayi');
            $table->string('username');
            $table->string('password');
            $table->date('tgl_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->integer('berat');
            $table->integer('panjang');
            $table->date('tgl_imunisasi_terakhir');
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
        //
        Schema::dropIfExist('bayi');
    }
}
