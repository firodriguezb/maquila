<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PermisoSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'descripcion'    => $faker->word,
            ];

            // Insert data into the database
            $this->db->table('permiso')->insert($data);
        }
    }
}
