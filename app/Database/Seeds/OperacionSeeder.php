<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OperacionSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->word,
                'descripcion'   => $faker->word,
                'id_ordenProduccion'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('operacion')->insert($data);
        }
    }
}
