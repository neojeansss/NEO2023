<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JudgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('judges')
            ->insert([
                [
                    'name' => "Reynard",
                    'role' => "Judge 1",
                    'message' => 'halo guys',
                    'picture' => '/',
                    'is_active' => true
                ]
            ]);
    }
}
