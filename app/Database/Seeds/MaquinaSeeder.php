<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MaquinaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $data = [
                'fechaAdquisicion'    => $faker->date,
                'tipo'   => $faker->word,
                'id_lineaProduccion' => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('maquina')->insert($data);
        }
    }
}