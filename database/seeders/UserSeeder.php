<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'IT Division',
                'role' => 'ADMIN',
                'email' => 'neo.it',
                'password' => Hash::make('neoIT123'),
                'institution' => null,
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Steering Committee',
                'role' => 'ADMIN',
                'email' => 'neo.sc',
                'password' => Hash::make('neoSC123'),
                'institution' => null,
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Debate Division',
                'role' => 'ADMIN',
                'email' => 'neo.debate',
                'password' => Hash::make('neoDB123'),
                'institution' => null,
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Newscasting Division',
                'role' => 'ADMIN',
                'email' => 'neo.newscasting',
                'password' => Hash::make('neoNC123'),
                'institution' => null,
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Storytelling Division',
                'role' => 'ADMIN',
                'email' => 'neo.storytelling',
                'password' => Hash::make('neoST123'),
                'institution' => null,
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Speech Division',
                'role' => 'ADMIN',
                'email' => 'neo.speech',
                'password' => Hash::make('neoSP123'),
                'institution' => null,
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Wen Sen Tan',
                'role' => 'USER',
                'email' => 'wensentan2003@gmail.com',
                'password' => Hash::make('wensen12345'),
                'institution' => 'Wen Sen School',
                'email_verified_at' => Carbon::now()
            ]
        ]);
    }
}
