<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OperarioSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'estadoCivil'    => $faker->randomElement(['Casado', 'Soltero', 'Unión Libre']),
                'nss'   => $faker->word,
                'curp'   => $faker->word,
                'antiguedad'   => $faker->date,
                'mRecta'   => $faker->boolean,
                'mOver'   => $faker->boolean,
                'mOjalera'   => $faker->boolean,
                'mBotonera'   => $faker->boolean,
                'mDosAgujas'    => $faker->boolean,
                'mPresilladora'   => $faker->boolean,
                'mMultiajugas'   => $faker->boolean,
                'mBlandyStitch'   => $faker->boolean,
                'detalles'   => $faker->word,
            ];

            // Insert data into the database
            $this->db->table('operario')->insert($data);
        }
    }
}
