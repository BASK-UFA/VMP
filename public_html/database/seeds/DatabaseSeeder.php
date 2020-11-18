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
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        factory(BlogPost::class, 30)->create();
        factory(Product::class, 30)->create();
    }
}
