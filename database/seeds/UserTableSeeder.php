<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Railton Teck',
            'email' => 'railtonleal98@2gmail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
