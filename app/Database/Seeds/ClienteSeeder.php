<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'id_Usuario' => $i,
            ];

            $this->db->table('cliente')->insert($data);
        }
    }
}
