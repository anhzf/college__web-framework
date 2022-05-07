<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\Services;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('products')
            ->insertBatch(
                $this->transform(
                    $this->get()['searchedProducts']['productDetails']
                )
            );
    }

    private function get()
    {
        $http = Services::curlrequest();
        $res = $http->get('https://api.nvidia.partners/edge/product/search?page=1&limit=10&locale=en-us');
        $json = $res->getBody();
        return json_decode($json, true);
    }

    private function transform(array $data)
    {
        return array_map(fn ($el) => [
            'name' => $el['productTitle'],
            'description' => join("\n", array_map(fn ($elEl) => "{$elEl['name']}: {$elEl['value']}", $el['productInfo'])),
            'price' => $el['productPrice'],
            'image' => $el['imageURL'],
        ], $data);
    }
}
