<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departemen = [
            [
                'nama' => 'Altavensa Mart',
                'alamat' => 'Kota Piring km.7',
                'email' => 'altavensamart@gmail.com',
                'telepon' => '081200010001',
            ],

            [
                'nama' => 'Dlavonexs',
                'alamat' => 'DI.Panjiatan km.9',
                'email' => 'dlavonexs@gmail.com',
                'telepon' => '081200020002',
            ],

        ];

        foreach ($departemen as $data) {
            Departemen::create($data);
        }
    }
}
