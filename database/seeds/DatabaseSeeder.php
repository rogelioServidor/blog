<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Comment::class,500)->create();
        //factory(App\User::class,20)->create();
        //factory(App\Post::class,100)->create();
    }
}
