<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MantenimientoSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'fecha'    => $faker->date,
                'horaReporte'   => $faker->time,
                'horaEntrega'   => $faker->time,
                'falla'   => $faker->word,
                'actividad'   => $faker->text,
                'id_Usuario'   => $faker->numberBetween(1,10),
                'id_maquina'   => $faker->numberBetween(3,10),
            ];

            // Insert data into the database
            $this->db->table('mantenimiento')->insert($data);
        }
    }
}
