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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_handphone', 13)->nullable();
            $table->string('tempat_lahir', 15);
            $table->date('tanggal_lahir');
            $table->longText('alamat')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile')->nullable();
            $table->enum('role', [1, 2])->default(2);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};