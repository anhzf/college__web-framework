<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\Services;

class FasilitasSeeder extends Seeder
{
    public function run()
    {
        $http = Services::curlrequest();
        $res = $http->get('http://devel.crissad.com/api/fasilitas');
        $json = $res->getBody();
        $data = json_decode($json, true);

        $this->db->table('fasilitas')->insertBatch(array_map(fn ($item) => [
            'name' => $item['fasilitas'],
            'description' => $item['deskripsi'],
            'image_url' => $item['foto'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at'],
        ], $data));
    }
}
