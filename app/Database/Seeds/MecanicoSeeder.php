<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MecanicoSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'antiguedad'    => $faker->date,
            ];

            // Insert data into the database
            $this->db->table('mecanico')->insert($data);
        }
    }
}
