<?php

namespace App\Controllers;

use App\Models\Product;

class Products extends BaseController
{

    public function index()
    {
        $model = new Product();
        $q = $this->request->getGet('q');
        $products = $q
            ? $model->like('name', $q)->findAll()
            : $model->findAll();

        return view('pages/products', compact('products'));
    }

    public function show(string $id)
    {
        $model = new Product();
        $product = $model->find($id);
        $relatedProducts = $model->findAll(5);

        if (!$product) {
            $this->response->setStatusCode(404);
        }

        return view('pages/product', compact('product', 'relatedProducts'));
    }
}
