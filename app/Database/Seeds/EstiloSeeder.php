<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class EstiloSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->name,
                'descripcion'   => $faker->word,
                'numeroSerie'   => $faker->numberBetween(1,50),
                'cantidad'   => $faker->randomNumber,
                'color'   => $faker->word,
                'id_orden'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('estilo')->insert($data);
        }
    }
}
