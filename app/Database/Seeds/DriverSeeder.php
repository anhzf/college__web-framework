<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('drivers')->insertBatch(array_fill(0, 10, $this->mockData()));
    }

    private function mockData()
    {
        return [
            'product_type' => 'TITAN',
            'product_series' => 'NVIDIA TITAN Series',
            'product' => 'NVIDIA TITAN RTX',
            'operating_system' => 'Windows 10 64-bit',
            'download_type' => 'Game Ready Driver (GRD)',
            'lang' => 'English (US)',
        ];
    }
}
