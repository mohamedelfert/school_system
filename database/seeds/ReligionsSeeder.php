<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();

        $religions = [
            [
                'ar' => 'مسلم',
                'en' => 'Muslim'
            ],
            [
                'ar' => 'مسيحي',
                'en' => 'Christian'
            ],
            [
                'ar' => 'غير ذلك',
                'en' => 'Other'
            ]
        ];

        foreach ($religions as $r){
            Religion::create(['name' => $r]);
        }
    }
}
