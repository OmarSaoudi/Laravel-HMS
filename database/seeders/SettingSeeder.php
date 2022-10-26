<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2022-2023'],
            ['key' => 'company_title', 'value' => 'OSC'],
            ['key' => 'company_name', 'value' => 'Omar Saoudi Company'],
            ['key' => 'end_first_term', 'value' => '10-10-2022'],
            ['key' => 'end_second_term', 'value' => '05-07-2023'],
            ['key' => 'phone', 'value' => '0666447689'],
            ['key' => 'address', 'value' => 'Msila'],
            ['key' => 'company_email', 'value' => 'saoudiomar518@gmail.com'],
            ['key' => 'logo', 'value' => 'company.png'],
        ];

        DB::table('settings')->insert($data);
    }
}
