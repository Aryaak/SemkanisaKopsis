<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'name' => 'Tunai'
        ]);
        Payment::create([
            'name' => 'Saldo'
        ]);
        // Payment::create([
        //     'name' => 'Debit'
        // ]);
        // Payment::create([
        //     'name' => 'Kredit'
        // ]);
        // Payment::create([
        //     'name' => 'Crypto'
        // ]);
    }
}
