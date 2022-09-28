<?php

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        $grades = [
            [
                'ar' => 'رياض اطفال',
                'en' => 'Kindergarten stage',
            ],
            [
                'ar' => 'المرحلة الابتدائية',
                'en' => 'Primary Stage',
            ],
            [
                'ar' => 'المرحلة الاعدادية',
                'en' => 'Preparatory Stage',
            ],
            [
                'ar' => 'المرحلة الثانوية',
                'en' => 'Secondary School',
            ],
        ];

        foreach ($grades as $grade){
            Grade::create(['name' => $grade]);
        }
    }
}
