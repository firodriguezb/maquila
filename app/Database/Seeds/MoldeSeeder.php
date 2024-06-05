<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MoldeSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->name,
                'talla'   => $faker->randomElement(['C', 'M', 'G']),
                'id_orden'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('molde')->insert($data);
        }
    }
}
