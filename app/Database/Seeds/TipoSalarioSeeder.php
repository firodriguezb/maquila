<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TipoSalarioSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombre'    => $faker->word,
            ];

            // Insert data into the database
            $this->db->table('tipo_salario')->insert($data);
        }
    }
}
