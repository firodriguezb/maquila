<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class BultoCorteSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombrePieza'    => $faker->word,
                'nombreBulto'   => $faker->word,
                'numeroPiezas'   => $faker->numberBetween(1,200),
                'id_corte'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('bulto_corte')->insert($data);
        }
    }
}
