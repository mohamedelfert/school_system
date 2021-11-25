<?php

use App\Models\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->delete();

        $blood_type = ['O +', 'O -', 'A +', 'A -', 'B +', 'B -', 'AB +', 'AB -'];

        foreach ($blood_type as $type){
            Blood::create(['name' => $type]);
        }
    }
}
