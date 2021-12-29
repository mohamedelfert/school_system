<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data['school_name'] = 'My International School';
        $data['school_title'] = 'MIS';
        $data['phone'] = '0123456789';
        $data['address'] = 'Egypt, Cairo';
        $data['school_email'] = 'info@myschool.com';
        $data['current_session'] = '2021-2022';
        $data['end_first_term'] = '01-12-2021';
        $data['end_second_term'] = '01-03-2022';
        $data['logo'] = '1.jpg';

        DB::table('settings')->insert($data);
    }
}
