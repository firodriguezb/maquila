<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CalidadSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'estatus'    => $faker->boolean,
                'id_controlBultos'   => $faker->numberBetween(11,20),
                'id_usuario'   => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('calidad')->insert($data);
        }
    }
}