<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 45);
            $table->string('nik_sap', 45);
            $table->string('nama', 145);
            $table->string('jabatan', 45);
            $table->string('nama_jabatan', 45);
            $table->string('grup_shift', 45);
            $table->string('poscode', 45);
            $table->string('postitle', 45);
            $table->string('kode_unit', 45);
            $table->string('unit_kerja', 200);
            $table->string('status_karyawan', 45);
            $table->date('valid_to');
            $table->date('terminate_date');
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
        Schema::dropIfExists('karyawan');
    }
}
