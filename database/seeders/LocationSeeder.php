<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'nama' => 'Stadion Utama',
                'alamat' => 'Jl. Gatot Subroto No. 1',
                'kota' => 'Jakarta',
                'kapasitas' => 50000,
            ],
            [
                'nama' => 'Galeri Seni Kota',
                'alamat' => 'Jl. Sudirman No. 45',
                'kota' => 'Bandung',
                'kapasitas' => 500,
            ],
            [
                'nama' => 'Taman Kota',
                'alamat' => 'Jl. Taman Raya No. 10',
                'kota' => 'Surabaya',
                'kapasitas' => 10000,
            ],
            [
                'nama' => 'Convention Hall',
                'alamat' => 'Jl. Asia Afrika No. 100',
                'kota' => 'Bandung',
                'kapasitas' => 2000,
            ],
            [
                'nama' => 'Outdoor Arena',
                'alamat' => 'Jl. Boulevard Raya No. 25',
                'kota' => 'Jakarta',
                'kapasitas' => 15000,
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
