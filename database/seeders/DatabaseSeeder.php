<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            CompetitionSeeder::class,
            PaymentProviderSeeder::class,
            EnvironmentSeeder::class,
            AccessSeeder::class,
            AccessControlSeeder::class,
        ]);
    }
}
