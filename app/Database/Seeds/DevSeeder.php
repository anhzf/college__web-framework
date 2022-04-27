<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DevSeeder extends Seeder
{
    public function run()
    {
        $this->call('FasilitasSeeder');
        $this->call('StaffSeeder');
        $this->call('MakulSeeder');
    }
}
