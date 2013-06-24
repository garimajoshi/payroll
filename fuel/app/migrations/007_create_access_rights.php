<?php

namespace Fuel\Migrations;

class Create_access_rights
{
	public function up()
	{
		\DBUtil::create_table('access_rights', array(
			'id' => array('constraint' => 11, 'type' => 'int',  'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'print_salary_statement' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'add_employee' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
                        'delete_employee' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
                        'change_salary_constants' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
                        'add_leave' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('access_rights');
	}
}