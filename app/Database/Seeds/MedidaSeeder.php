<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MedidaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->name,
                'medida'   => $faker->word,
                'descripcion'   => $faker->word,
                'id_molde'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('medida')->insert($data);
        }
    }
}
