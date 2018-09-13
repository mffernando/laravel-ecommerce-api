<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Product;
use App\Model\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //create fake datas
        factory(User::class, 5)->create();
        factory(Product::class, 50)->create();
        factory(Review::class, 50)->create();
    }
}
