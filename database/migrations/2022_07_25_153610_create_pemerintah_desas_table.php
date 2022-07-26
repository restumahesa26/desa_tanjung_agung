<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemerintahDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemerintah_desas', function (Blueprint $table) {
            $table->id();
            $table->string('kades');
            $table->string('sekdes');
            $table->string('kaur_umum_perencanaan');
            $table->string('kasi_kesra');
            $table->string('kasi_pelayanan');
            $table->string('kasi_pemerintah');
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
        Schema::dropIfExists('pemerintah_desas');
    }
}
