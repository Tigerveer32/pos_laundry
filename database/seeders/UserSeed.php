<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
                'nama_lengkap' => 'administrator',
                'email' => 'administrator@gmail.com',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Kudus',
                'tanggal_lahir' => '1999-01-01',
                'password' => Hash::make(12345678),
                'role'      =>  1
        );

        User::create($data);
    }
}
