<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_pelanggan', 'fk_transaksi_to_pelanggan')->references('id')->on('pelanggan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_layanan', 'fk_transaksi_to_layanan')->references('id')->on('layanan')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('fk_transaksi_to_pelanggan');
            $table->dropForeign('fk_transaksi_to_layanan');
        });
    }
};
