<?php

use App\Models\{
    Plan,
    Tenant,
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first(); //Recupera através do relacionamento.

        $plan->tenants()->create([
            'cnpj' => '26508716000198',
            'name' => 'Joia Marketing',
            'email' => 'sitejoia@hotmail.com',
            'url' => 'joia-marketing',
        ]);
    }
}
