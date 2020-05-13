<?php

use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(BlogCategoriesTableSeeder::class);
         factory(BlogPost::class, 100)->create();
         factory(Product::class, 10)->create();
    }
}
