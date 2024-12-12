<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_mahasiswa' => 1,
                'nomor_induk' => '2241760062',
                'username' => '2241760062',
                'nama' => 'Zanuar Aldi Syahputra',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 6,
                'jam_kompen' => 12,
                'jam_kompen_selesai' => 2,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 2,
                'nomor_induk' => '2241760060',
                'username' => '2241760060',
                'nama' => 'M. Khasbul Hadi Fauzan',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 20,
                'jam_kompen' => 40,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 3,
                'nomor_induk' => '2241760070',
                'username' => '2241760070',
                'nama' => 'Ahmad Iqbal Firmansyah',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 50,
                'jam_kompen' => 100,
                'jam_kompen_selesai' => 10,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 4,
                'nomor_induk' => '2241760042',
                'username' => '2241760042',
                'nama' => 'Agung Nugroho',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 30,
                'jam_kompen' => 60,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 5,
                'nomor_induk' => '2241760023',
                'username' => '2241760023',
                'nama' => 'Arif Prasojo',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 66,
                'jam_kompen' => 132,
                'jam_kompen_selesai' => 33,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 6,
                'nomor_induk' => '2241760001',
                'username' => '2241760001',
                'nama' => 'Agta Fadjrin Aminullah',
                'periode' => 2024,
                'id_prodi' => 1,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 0,
                'jam_kompen' => 0,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 7,
                'nomor_induk' => '224176077',
                'username' => '224176077',
                'nama' => 'Ervan Dwi Ardian',
                'periode' => 2024,
                'id_prodi' => 1,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 10,
                'jam_kompen' => 20,
                'jam_kompen_selesai' => 5,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 8,
                'nomor_induk' => '2241760069',
                'username' => '2241760069',
                'nama' => 'Hertin Nurhayati',
                'periode' => 2024,
                'id_prodi' => 1,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 0,
                'jam_kompen' => 0,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 9,
                'nomor_induk' => '2241760087',
                'username' => '2241760087',
                'nama' => 'Hilmy Zaky Mustakim',
                'periode' => 2024,
                'id_prodi' => 3,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 30,
                'jam_kompen' => 60,
                'jam_kompen_selesai' => 12,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 10,
                'nomor_induk' => '2241760080',
                'username' => '2241760080',
                'nama' => 'M. Ivan Yoda Bellamy',
                'periode' => 2024,
                'id_prodi' => 3,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 44,
                'jam_kompen' => 88,
                'jam_kompen_selesai' => 19,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 11,
                'nomor_induk' => '2241760199',
                'username' => '2241760199',
                'nama' => 'Roger Gerald',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 12,
                'jam_kompen' => 24,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 12,
                'nomor_induk' => '2241760180',
                'username' => '2241760180',
                'nama' => 'Kania Putri',
                'periode' => 2024,
                'id_prodi' => 1,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 4,
                'jam_kompen' => 8,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ],
            [
                'id_mahasiswa' => 13,
                'nomor_induk' => '2241760189',
                'username' => '2241760189',
                'nama' => 'Mahasiswa',
                'periode' => 2024,
                'id_prodi' => 2,
                'password' => Hash::make('123456789'),
                'jam_alpha' => 20,
                'jam_kompen' => 40,
                'jam_kompen_selesai' => 0,
                'id_level' => 4 
            ]
        ];

        DB::table('mahasiswa')->insert($data);
    }
}
