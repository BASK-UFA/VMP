<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'Администратор',
                'email'     => 'admin@vmp.ru',
                'password'  => bcrypt('password')
            ]
        ];

        DB::table('users')->insert($data);
    }
}
