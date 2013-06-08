<?php

namespace Fuel\Migrations;

class Create_leaves
{
	public function up()
	{
		\DBUtil::create_table('leaves', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'eid' => array('constraint' => 11, 'type' => 'int'),
			'date' => array('type' => 'date'),
			'reason' => array('constraint' => 255, 'type' => 'varchar'),
			'type' => array('constraint' => '"full","half"', 'type' => 'enum'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('leaves');
	}
}