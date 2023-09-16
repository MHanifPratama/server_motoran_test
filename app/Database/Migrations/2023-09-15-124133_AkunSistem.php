<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunSistem extends Migration
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
			'apps_booking_number'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'akun'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
            'bearer_token' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
		]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('akun_sistem', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('akun_sistem');
    }
}
