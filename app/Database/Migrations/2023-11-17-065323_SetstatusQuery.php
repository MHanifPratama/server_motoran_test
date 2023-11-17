<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SetstatusQuery extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'query_data'       => [
				'type'         => 'TEXT',
				'null' 		=> true,
                
			],
		]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('setstatus_query', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('setstatus_query');
    }
}
