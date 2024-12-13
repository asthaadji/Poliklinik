<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_obat')->insert([
            'nama_obat' => 'panadol',
            'kemasan' => 'kemasan',
            'harga' => '10000',
        ]);

        DB::table('table_obat')->insert([
            'nama_obat' => 'Prednison',
            'kemasan' => 'kemasan',
            'harga' => '8000',
        ]);

        DB::table('table_obat')->insert([
            'nama_obat' => 'Dexamenthasone',
            'kemasan' => 'kemasan',
            'harga' => '9500',
        ]);

    }
}
