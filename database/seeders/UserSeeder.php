<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Arry Kusuma Putra',
            'nama_pengguna' => 'arryputra',
            'password' => Hash::make('@rke79DOPT110'),
            'peran_id' => 1
        ]);
    }
}
