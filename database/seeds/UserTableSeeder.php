<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'm7md ibrahiem',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);
    }
}
