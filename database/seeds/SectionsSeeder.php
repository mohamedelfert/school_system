<?php

use App\Models\Chapter;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->delete();

        $chapters = [
            [
                'ar' => 'الصف الاول',
                'en' => 'first class',
            ],
            [
                'ar' => 'الصف الثاني',
                'en' => 'second class',
            ],
            [
                'ar' => 'الصف الثالث',
                'en' => 'third class',
            ],
            [
                'ar' => 'الصف الرابع',
                'en' => 'forth class',
            ],
        ];

        foreach ($chapters as $chapter) {
            Chapter::create([
                'chapter_name' => $chapter,
                'grade_id' => Grade::all()->unique()->random()->id,
            ]);
        }
    }
}
