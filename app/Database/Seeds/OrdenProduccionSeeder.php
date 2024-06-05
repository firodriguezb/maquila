<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OrdenProduccionSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'cantidad'    => $faker->numberBetween(1,200),
                'id_lineaProduccion'   => $faker->numberBetween(1,10),
                'id_corte'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('orden_produccion')->insert($data);
        }
    }
}
