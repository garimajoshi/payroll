<?php

namespace Fuel\Migrations;

class Create_access_rights
{
	public function up()
	{
		\DBUtil::create_table('access_rights', array(
			'id' => array('constraint' => 11, 'type' => 'int',  'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'print_salary_statement' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'add_employee' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('access_rights');
	}
}