<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'nama_kelas' => 'X IPA 1',
            'jurusan_id' => 1,
            'guru_id' => 1,
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'X IPS 1',
            'jurusan_id' => 2,
            'guru_id' => 2,
        ]);

        // DB::table('kelas')->insert([
        //     'nama_kelas' => 'XI IPS 1',
        //     'jurusan_id' => 3,
        //     'guru_id' => 3,
        // ]);


        // Assuming you have a valid $jurusanId value available
        $jurusanId = 1; // Replace with the actual value

        DB::table('kelas')->insert([
            'nama_kelas' => 'XII IPA 1',
            'guru_id' => 3,
            'jurusan_id' => $jurusanId,
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
