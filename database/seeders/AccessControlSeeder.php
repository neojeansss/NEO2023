<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccessControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('access_controls')->insert([
            [
                'access_id' => 1,
                'user_id' => 1,
            ],
            [
                'access_id' => 2,
                'user_id' => 1,
            ],
            [
                'access_id' => 3,
                'user_id' => 1,
            ],
            [
                'access_id' => 4,
                'user_id' => 1,
            ],
            [
                'access_id' => 5,
                'user_id' => 1,
            ],
            [
                'access_id' => 6,
                'user_id' => 1,
            ],
            [
                'access_id' => 7,
                'user_id' => 1,
            ],
            [
                'access_id' => 8,
                'user_id' => 1,
            ],
            [
                'access_id' => 9,
                'user_id' => 1,
            ],
            [
                'access_id' => 10,
                'user_id' => 1,
            ],
            [
                'access_id' => 11,
                'user_id' => 1,
            ],
            [
                'access_id' => 12,
                'user_id' => 1,
            ],
        ]);
    }
}
