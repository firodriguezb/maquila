<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ControlBultosSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'numeroBulto'    => $faker->numberBetween(1,20),
                'talla'   => $faker->randomElement(['C', 'M', 'G']),
                'cantidad'   => $faker->numberBetween(1,50),
                'fecha'   => $faker->date,
                'hora'   => $faker->time,
                'estatus'   => $faker->randomElement(['Activo', 'Inactivo']),
                'id_operacion'   => $faker->numberBetween(2,10),
                'id_usuario'   => $faker->numberBetween(2,10),
            ];

            // Insert data into the database
            $this->db->table('control_bultos')->insert($data);
        }
    }
}