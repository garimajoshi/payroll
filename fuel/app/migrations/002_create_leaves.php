<?php

namespace Fuel\Migrations;

class Create_leaves
{
	public function up()
	{
		\DBUtil::create_table('leaves', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'employee_id' => array('constraint' => 10, 'type' => 'varchar'),
			'date_of_leave' => array('type' => 'date'),
			'reason' => array('constraint' => 255, 'type' => 'varchar'),
			'type' => array('constraint' => '"half","full"', 'type' => 'enum'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('leaves');
	}
}
