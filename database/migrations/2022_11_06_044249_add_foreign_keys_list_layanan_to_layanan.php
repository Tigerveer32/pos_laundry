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
        Schema::table('list_layanan', function (Blueprint $table) {
            $table->foreign('id_layanan', 'fk_list_layanan_to_layanan')->references('id')->on('layanan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_layanan', function (Blueprint $table) {
            $table->dropForeign('fk_list_layanan_to_layanan');
        });
    }
};