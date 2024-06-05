<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CorteSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'id_orden'    => $faker->numberBetween(1,10),
                'id_usuario'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('corte')->insert($data);
        }
    }
}
