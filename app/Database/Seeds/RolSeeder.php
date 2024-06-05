<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class RolSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombreRol'    => $faker->word,
            ];

            // Insert data into the database
            $this->db->table('rol')->insert($data);
        }
    }
}
