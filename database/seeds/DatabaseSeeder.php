<?php

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
        // $this->call(UsersTableSeeder::class);
        //create 50 fakes datas
        Factory(App\Model\Product::class, 50)->create();
        Factory(App\Model\Review::class, 50)->create();
    }
}
