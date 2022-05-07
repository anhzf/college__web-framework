<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\TableView;
use App\Models\Driver;
use CodeIgniter\View\Table;

class Drivers extends BaseController
{
    public function index()
    {
        $model = new Driver();
        $q = $this->request->getGet('q');
        $drivers = $q
            ? $model->like('product', $q)->findAll()
            : $model->findAll();

        $table = new Table();
        $table->setTemplate(TableView::TEMPLATE);
        $table->setHeading('Type', 'Series', 'Name', 'Operating System', 'Actions');

        if (count($drivers) <= 0) {
            $table->addRow(['data' => 'No drivers found.', 'colspan' => count($table->heading)]);
        }

        array_walk($drivers, fn ($item) => $table->addRow([
            $item['product_type'],
            $item['product_series'],
            $item['product'],
            $item['operating_system'],
            [
                'data' => "<div class=\"flex flex-col\">
                " . view('components/btn', [
                    'children' => 'Download'
                ]) . "
                <span class=\"text-center\">{$item['download_type']}</span>
                </div>",
                'class' => 'text-sm font-medium text-gray-500 px-4 py-5 sm:px-6 w-64'
            ]
        ]));

        return view('pages/drivers', ['driverTable' => $table->generate()]);
    }
}
