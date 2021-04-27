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
        $admin = \App\Models\Role::where('slug', 'admin')->first();
        $teacher = \App\Models\Role::where('slug', 'teacher')->first();
        $publicBlogPost = \App\Models\Permission::where('slug', 'public-blog-post')->first();

        $data = [
            'name' => 'Администратор',
            'email' => 'admin@vmp.ru',
            'password' => bcrypt('password')
        ];

        $user = \App\Models\User::create($data);
        $user->roles()->attach($admin);
        $user->roles()->attach($teacher);
        $user->permissions()->attach($publicBlogPost);
    }
}
