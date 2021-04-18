<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicBlogPost = new \App\Models\Permission();
        $publicBlogPost->name = 'Опубликовать пост на главной странице';
        $publicBlogPost->slug = 'public-blog-post';
        $publicBlogPost->save();

        $publicProduct = new \App\Models\Permission();
        $publicProduct->name = 'Опубликовать работу на главной странице';
        $publicProduct->slug = 'public-product';
        $publicProduct->save();

        DB::table('roles_permissions')->insert(['role_id' => 1, 'permission_id' => 1]);
        DB::table('roles_permissions')->insert(['role_id' => 1, 'permission_id' => 2]);
    }
}
