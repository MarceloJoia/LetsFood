<?php

namespace Database\Seeders;

use App\Models\{
    Tenant,
    User
};
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
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Marcelo Joia',
            'email' => 'sitejoia@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
