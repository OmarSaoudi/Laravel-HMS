<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(NationalitieTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(SpecializationTableSeeder::class);
        $this->call(DayTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(SpecialistTableSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
