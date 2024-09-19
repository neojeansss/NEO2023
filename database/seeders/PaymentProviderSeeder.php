<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_providers')->insert([
            [ 'type' => 'BANK', 'name' => 'BCA' ],
            [ 'type' => 'BANK', 'name' => 'BNI' ],
            [ 'type' => 'BANK', 'name' => 'BRI' ],
            [ 'type' => 'BANK', 'name' => 'BTN' ],
            [ 'type' => 'BANK', 'name' => 'Mandiri' ],
            [ 'type' => 'BANK', 'name' => 'Other' ],
            [ 'type' => 'EWALLET', 'name' => 'DANA' ],
            [ 'type' => 'EWALLET', 'name' => 'GoPay' ],
            [ 'type' => 'EWALLET', 'name' => 'LinkAja' ],
            [ 'type' => 'EWALLET', 'name' => 'OVO' ],
            [ 'type' => 'EWALLET', 'name' => 'ShopeePay' ],
            [ 'type' => 'EWALLET', 'name' => 'Other' ],
        ]);
    }
}
