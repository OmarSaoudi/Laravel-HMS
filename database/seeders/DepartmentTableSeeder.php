<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        $departments = [

            [
                'en'=> 'Pathology Department',
                'ar'=> 'قسم علم الأمراض',
            ],
            [
                'en'=> 'Pharmacy Department',
                'ar'=> 'قسم الصيدلة',
            ],
            [
                'en'=> 'Dietary Department',
                'ar'=> 'قسم التغذية',
            ],
            [
                'en'=> 'Purchasing Department',
                'ar'=> 'قسم المشتريات',
            ],
            [
                'en'=> 'Mechanical Department',
                'ar'=> 'القسم الميكانيكي',
            ],
            [
                'en'=> 'Outpatient Department',
                'ar'=> 'قسم العيادات الخارجية',
            ],
            [
                'en'=> 'Medical Department',
                'ar'=> 'القسم الطبي',
            ],
            [
                'en'=> 'Nursing Department',
                'ar'=> 'قسم التمريض',
            ],

        ];

        foreach ($departments as $d) {
            Department::create(['name' => $d]);
        }
    }
}
