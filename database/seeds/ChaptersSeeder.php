<?php

use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;

class ChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->delete();

        $sections = [
            [
                'ar' => 'أ',
                'en' => 'A',
            ],
            [
                'ar' => 'ب',
                'en' => 'B',
            ],
            [
                'ar' => 'ج',
                'en' => 'G',
            ],
            [
                'ar' => 'د',
                'en' => 'D',
            ],
        ];

        foreach ($sections as $section) {
            Section::create([
                'section_name' => $section,
                'status' => 1,
                'grade_id' => Grade::all()->unique()->random()->id,
                'chapter_id' => Chapter::all()->unique()->random()->id,
            ]);
        }
    }
}
