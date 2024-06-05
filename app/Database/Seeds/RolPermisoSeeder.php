<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class RolPermisoSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'id_permiso'    => $faker->numberBetween(1,10),
                'id_rol'    => $faker->numberBetween(1,10),
            ];

            // Insert data into the database
            $this->db->table('rol_permiso')->insert($data);
        }
    }
}
