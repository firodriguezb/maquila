<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ResultadoSemanalSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'cantidad'    => $faker->randomNumber,
                'color'    => $faker->word,
                'precio'    => $faker->randomNumber,
                'fecha'    => $faker->date,
                'total'    => $faker->randomNumber,
                'id_orden'    => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('resultado_semanal')->insert($data);
        }
    }
}
