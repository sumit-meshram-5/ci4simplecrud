<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP' ,
  			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'deleted_at TIMESTAMP DEFAULT null' ,

			
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
