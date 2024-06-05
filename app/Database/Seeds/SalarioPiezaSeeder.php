<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SalarioPiezaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'tarifaPieza'    => $faker->randomNumber,
                'id_tso'    => $faker->numberBetween(2,10),
            ];

            // Insert data into the database
            $this->db->table('salario_pieza')->insert($data);
        }
    }
}
