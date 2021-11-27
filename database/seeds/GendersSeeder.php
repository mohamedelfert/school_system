<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();

        $gender_type = [
            [
                'ar' => 'ذكر',
                'en' => 'Male',
            ],
            [
                'ar' => 'انثي',
                'en' => 'Female',
            ]
        ];

        foreach ($gender_type as $type){
            Gender::create(['gender_name' => $type]);
        }
    }
}
