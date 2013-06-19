<?php

namespace Fuel\Migrations;

class Create_access_rights
{
	public function up()
	{
		\DBUtil::create_table('access_rights', array(
			'id' => array('constraint' => 11, 'type' => 'int',  'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'print_invoice' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'add_panel' => array('constraint' => '"0","1"', 'type' => 'enum'),
            'add_monthly_client' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('access_rights');
	}
}