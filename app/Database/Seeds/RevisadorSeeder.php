<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class RevisadorSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'estadoCivil'    => $faker->randomElement(['Casado', 'Soltero', 'Unión Libre']),
                'nss'    => $faker->randomNumber,
                'curp'    => $faker->randomNumber,
                'antiguedad'    => $faker->date,
            ];

            // Insert data into the database
            $this->db->table('revisador')->insert($data);
        }
    }
}
