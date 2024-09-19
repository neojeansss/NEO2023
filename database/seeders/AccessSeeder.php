<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accesses')->insert([
            [
                'code' => 'environment',
                'name' => 'Environment',
            ],
            [
                'code' => 'access_control',
                'name' => 'Access Control',
            ],
            [
                'code' => 'access',
                'name' => 'Access',
            ],
            [
                'code' => 'registration',
                'name' => 'Registration',
            ],
            [
                'code' => 'competition',
                'name' => 'Competition',
            ],
            [
                'code' => 'message_from_sc',
                'name' => 'Message From SC',
            ],
            [
                'code' => 'testimony',
                'name' => 'Testimony',
            ],
            
            [
                'code' => 'judge',
                'name' => 'Judge',
            ],
            [
                'code' => 'merchandise',
                'name' => 'Merchandise',
            ],
            [
                'code' => 'event',
                'name' => 'Event',
            ],
            [
                'code' => 'faq',
                'name' => 'FAQ',
            ],
            [
                'code' => 'support',
                'name' => 'Support',
            ]
        ]);
    }
}
