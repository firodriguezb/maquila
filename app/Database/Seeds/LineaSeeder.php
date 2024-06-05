<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class LineaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->name,
                'id_usuario'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('linea_de_produccion')->insert($data);
        }
    }
}
