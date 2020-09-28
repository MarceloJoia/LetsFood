<?php

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Marcelo Joia',
            'email' => 'sitejoia@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
