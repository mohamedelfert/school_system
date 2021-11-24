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
        DB::table('religions')->truncate();

        $religions = [
            [
                'مسلم',
                'Muslim'
            ],
            [
                'مسيحي',
                'Christian'
            ],
            [
                'غير ذلك',
                'Other'
            ]
        ];

        foreach ($religions as $r){
            Religion::create(['religion_name' => $r]);
        }
    }
}
