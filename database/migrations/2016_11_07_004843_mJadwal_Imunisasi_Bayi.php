<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MJadwalImunisasiBayi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jadwal_Imunisasi_Bayi', function (Blueprint $table) {
            $table->String('id');
            $table->Bayi('bayi');
            $table->Jadwal('jadwal')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Jadwal_Imunisasi_Bayi');
    }
}
