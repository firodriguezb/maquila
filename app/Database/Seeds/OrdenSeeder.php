<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OrdenSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'numeroOrden'    => $faker->numberBetween(1,10),
                'fechaInicio'   => $faker->date,
                'fechaFin'   => $faker->date,
                'estatus'   => $faker->randomElement(['Activo','Inactivo']),
                'id_Usuario'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('orden')->insert($data);
        }
    }
}
