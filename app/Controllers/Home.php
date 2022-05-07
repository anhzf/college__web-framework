<?php

namespace App\Controllers;

use App\Models\Product;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new Product();
        $products = $productModel->findAll(6);
        return view('pages/index', compact('products'));
    }
}
