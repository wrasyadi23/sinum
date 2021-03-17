<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unit', 45)->unique();
            $table->string('unit_kerja', 45);
            $table->string('parent_kode_unit', 45)->nullable();
            $table->string('status', 45);
            $table->timestamps();

            $table->foreign('parent_kode_unit')
                ->reference('kode_unit')
                ->on('organisasi')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisasi');
    }
}
