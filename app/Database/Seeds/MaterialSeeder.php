<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->word,
                'cantidad'   => $faker->randomNumber,
                'id_orden'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('material')->insert($data);
        }
    }
}
