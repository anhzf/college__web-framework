<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStaffTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'picture_url' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'research_interest' => [
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
        $this->forge->addUniqueKey(['nip']);
        $this->forge->createTable('staff', true);
    }

    public function down()
    {
        $this->forge->dropTable('staff', true);
    }
}
