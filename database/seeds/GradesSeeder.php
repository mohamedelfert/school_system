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

        $specialization = [
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

        foreach ($specialization as $s){
            Grade::create(['name' => $s]);
        }
    }
}
