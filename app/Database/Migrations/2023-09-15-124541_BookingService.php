<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookingService extends Migration
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
			'booking_number'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'status'      => [
				'type'           => 'INT',
				'constraint'     => 10,
			],
			'booking_fee' => [
				'type'           => 'INT',
				'constraint'     => 100,
			],
			'services'      => [
				'type'           => 'TEXT',
				'null'           => true,
			],
            'spareparts'      => [
				'type'           => 'TEXT',
				'null'           => true,
			],
            'discount'      => [
				'type'           => 'TEXT',
				'null'           => true,
			],
		]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('booking_service', TRUE);
    }

    public function down()
    {
        //
    }
}
