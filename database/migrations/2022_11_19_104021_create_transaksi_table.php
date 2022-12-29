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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->index('fk_transaksi_to_pelanggan')->nullable();
            $table->foreignId('id_layanan')->index('fk_transaksi_to_layanan');
            $table->string('no_order',20)->nullable();
            $table->string('nama', 50)->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('berat', 10);
            $table->string('total_harga', 10);
            $table->string('status_pesanan');
            $table->enum('status_pembayaran', [0,1])->default(0);
            $table->string('alamat')->nullable();
            $table->date('tanggal')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transaksi');
    }
};
