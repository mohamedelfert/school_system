<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();

        $specialization = [
            [
                'ar' => 'عربي',
                'en' => 'Arabic',
            ],
            [
                'ar' => 'علوم',
                'en' => 'Science',
            ],
            [
                'ar' => 'حاسب الي',
                'en' => 'Computer',
            ],
            [
                'ar' => 'انجليزي',
                'en' => 'English',
            ],
            [
                'ar' => 'رياضيات',
                'en' => 'Math',
            ],
        ];

        foreach ($specialization as $s){
            Specialization::create(['name' => $s]);
        }
    }
}
