<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentTypes = [
            [
                'nama' => 'Cash',
                'deskripsi' => 'Pembayaran tunai langsung',
                'is_active' => true,
            ],
            [
                'nama' => 'Credit Card',
                'deskripsi' => 'Pembayaran menggunakan kartu kredit',
                'is_active' => true,
            ],
            [
                'nama' => 'Debit Card',
                'deskripsi' => 'Pembayaran menggunakan kartu debit',
                'is_active' => true,
            ],
            [
                'nama' => 'GoPay',
                'deskripsi' => 'Pembayaran melalui aplikasi GoPay',
                'is_active' => true,
            ],
            [
                'nama' => 'OVO',
                'deskripsi' => 'Pembayaran melalui aplikasi OVO',
                'is_active' => true,
            ],
            [
                'nama' => 'Dana',
                'deskripsi' => 'Pembayaran melalui aplikasi Dana',
                'is_active' => true,
            ],
            [
                'nama' => 'Bank Transfer',
                'deskripsi' => 'Transfer bank melalui ATM atau mobile banking',
                'is_active' => true,
            ],
        ];

        foreach ($paymentTypes as $paymentType) {
            PaymentType::create($paymentType);
        }
    }
}
