<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama' => 'Pendapatan Penjualan'
            ],

            [
                'nama' => ' Pelayanan'
            ],

            [
                'nama' => 'Iuran Listik'
            ],

            [
                'nama' => 'Iuran Internet'
            ],
        ];

        foreach ($kategori as $data) {
            Kategori::create($data);
        }
    }
}
