<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
        'name' => 'prabin',
        'email' => 'judasprabin@gmail.com',
        'password' => bcrypt('diablo')
      ]);
    }
}
