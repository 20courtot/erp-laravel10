<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'Marie Dupont',
            'email' => 'marie.dupont@example.com',
            'phone_number' => '0601020304',
            'address' => '12 rue des Fleurs, Paris, France',
        ]);

        Customer::create([
            'name' => 'Luc Martin',
            'email' => 'luc.martin@example.com',
            'phone_number' => '0612345678',
            'address' => '34 avenue des Champs, Lyon, France',
        ]);

        Customer::create([
            'name' => 'Emma Leclerc',
            'email' => 'emma.leclerc@example.com',
            'phone_number' => '0623456789',
            'address' => '23 boulevard de la République, Marseille, France',
        ]);
    }
}

