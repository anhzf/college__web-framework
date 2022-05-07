<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDriversTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'product_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'product_series' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'product' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'operating_system' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'download_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);
        $this->forge->createTable('drivers', true);
    }

    public function down()
    {
        $this->forge->dropTable('drivers', true);
    }
}
