<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class JornadaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'fecha'    => $faker->date,
                'horaEntrada'   => $faker->time,
                'horaSalida'   => $faker->time,
                'id_Usuario'   => $faker->numberBetween(1,10),

            ];

            // Insert data into the database
            $this->db->table('jornada_laboral')->insert($data);
        }
    }
}
