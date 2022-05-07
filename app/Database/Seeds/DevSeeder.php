<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DevSeeder extends Seeder
{
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(DriverSeeder::class);
    }
}
