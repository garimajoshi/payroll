<?php

namespace Fuel\Migrations;

class Create_employees
{
	public function up()
	{
		\DBUtil::create_table('employees', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'emp_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'designation' => array('constraint' => 255, 'type' => 'varchar'),
			'phone' => array('constraint' => 11, 'type' => 'int'),
			'address' => array('constraint' => 255, 'type' => 'varchar'),
			'city' => array('constraint' => 255, 'type' => 'varchar'),
			'state' => array('constraint' => 255, 'type' => 'varchar'),
			'pincode' => array('constraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'joining_date' => array('type' => 'date'),
			'date_of_birth' => array('type' => 'date'),
			'sex' => array('constraint' => '"male","female"', 'type' => 'enum'),
			'marital_status' => array('constraint' => '"single","married","divorced","widowed"', 'type' => 'enum'),
			'activity_status' => array('constraint' => '"active","inactive"', 'type' => 'enum'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('employees');
	}
}
