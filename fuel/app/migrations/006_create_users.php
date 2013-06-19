<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primery key' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 20, 'type' => 'varchar'),
			'last_login_at' => array('type' => 'timestamp'),
			'created_at' => array('type' => 'timestamp', 'default' => '1999-12-31 18:30:00'),
			'updated_at' => array('type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}