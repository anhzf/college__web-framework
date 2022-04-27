<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFasilitasTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->createTable('fasilitas', true);
    }

    public function down()
    {
        $this->forge->dropTable('fasilitas', true);
    }
}
