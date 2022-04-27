<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMakulTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'sks' => [
                'type' => 'BIT',
                'constraint' => '6',
            ],
            'semester' => [
                'type' => 'BIT',
                'constraint' => '8',
            ],
            'is_compulsory' => [
                'type' => 'BOOLEAN',
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
        $this->forge->addUniqueKey(['code']);
        $this->forge->createTable('makul', true);
    }

    public function down()
    {
        $this->forge->dropTable('makul', true);
    }
}
