<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SalarioOperadorSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'id_tipoSalario'    => $faker->numberBetween(2,10),
                'id_Usuario'    => $faker->numberBetween(2,10),
            ];

            // Insert data into the database
            $this->db->table('salario_operador')->insert($data);
        }
    }
}
