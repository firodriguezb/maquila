<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SalarioFijoSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'tarifa'    => $faker->randomNumber,
                'id_tso'    => $faker->numberBetween(2,10),
            ];

            // Insert data into the database
            $this->db->table('salario_fijo')->insert($data);
        }
    }
}
