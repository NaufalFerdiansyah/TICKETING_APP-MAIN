<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketTypes = [
            [
                'nama' => 'Reguler',
                'deskripsi' => 'Tiket standar dengan fasilitas dasar',
            ],
            [
                'nama' => 'Premium',
                'deskripsi' => 'Tiket dengan fasilitas lebih baik dan tempat duduk yang lebih strategis',
            ],
            [
                'nama' => 'VIP',
                'deskripsi' => 'Tiket eksklusif dengan akses ke area VIP dan fasilitas lengkap',
            ],
            [
                'nama' => 'VVIP',
                'deskripsi' => 'Tiket paling eksklusif dengan semua fasilitas premium dan akses backstage',
            ],
        ];

        foreach ($ticketTypes as $ticketType) {
            TicketType::create($ticketType);
        }
    }
}
