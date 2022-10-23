<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Specialist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialists')->delete();

        $specialists = [

            [
                'en'=> 'Plastic & Cosmetic Surgery',
                'ar'=> 'الجراحة التجميلية والبلاستيكية',
            ],
            [
                'en'=> 'Micro Vascular',
                'ar'=> 'الأوعية الدموية الدقيقة',
            ],
            [
                'en'=> 'Urology',
                'ar'=> 'جراحة المسالك البولية',
            ],
            [
                'en'=> 'Laproscopic Urology',
                'ar'=> 'جراحة المسالك البولية بالمنظار',
            ],
            [
                'en'=> 'Orthopaedics',
                'ar'=> 'طب العظام',
            ],
            [
                'en'=> 'Trauma Care',
                'ar'=> 'العناية بالصدمات',
            ],

        ];

        foreach ($specialists as $s) {
            Specialist::create(['name' => $s]);
        }
    }
}
