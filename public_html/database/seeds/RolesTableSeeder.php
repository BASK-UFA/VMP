<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'name' => 'Администратор',
                'slug' => 'admin'
            ],
            [
                'name' => 'Модератор',
                'slug' => 'moder'
            ],
            [
                'name' => 'Ученик',
                'slug' => 'student',
                'public' => 1
            ],
            [
                'name' => 'Учитель',
                'slug' => 'teacher',
                'public' => 1
            ],
        ];

        foreach ($data as $role) {
            Role::create($role)->save();
        }
    }
}
