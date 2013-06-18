<?php

namespace Fuel\Migrations;

class Create_access_rights
{
	public function up()
	{
		\DBUtil::create_table('access_rights', array(
			'id' => array('constraint' => 11, 'type' => 'int',  'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'add_employee' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
			'archive_employee' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
                        'make_payroll' => array('constraint' => '"0","1","2"', 'type' => 'enum'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('access_rights');
	}
}
