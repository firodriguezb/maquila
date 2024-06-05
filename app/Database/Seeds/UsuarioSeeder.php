<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nombreUsuario'    => $faker->userName,
                'contraseña'   => $faker->password,
                'nombre'   => $faker->name,
                'apellidoPaterno'   => $faker->lastName,
                'apellidoMaterno'   => $faker->lastName,
                'sexo'   => $faker->randomElement(['M','F']),
                'fechaDeNacimiento'   => $faker->date,
                'domicilio'   => $faker->address,
            ];

            // Insert data into the database
            $this->db->table('usuario')->insert($data);
        }
    }
}
