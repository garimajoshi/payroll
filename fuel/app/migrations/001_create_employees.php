<?php

namespace Fuel\Migrations;

class Create_employees
{
	public function up()
	{
		\DBUtil::create_table('employees', array(
			'id' => array('constraint' => 10, 'type' => 'varchar'),
                        'title' => array('constraint' => '"dr","mr","miss","mrs"', 'type' => 'enum'),
			'first_name' => array('constraint' => 255, 'type' => 'varchar'),
			'last_name' => array('constraint' => 255, 'type' => 'varchar'),
                        'branch' => array('constraint' => 255, 'type' => 'varchar', 'default' => 'Karnataka'),
			'phone' => array('constraint' => 255, 'type' => 'varchar'),
			'address' => array('constraint' => 255, 'type' => 'varchar'),
			'city' => array('constraint' => 255, 'type' => 'varchar'),
			'state' => array('constraint' => 255, 'type' => 'varchar'),
			'pincode' => array('constraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'joining_date' => array('type' => 'date'),
			'leaving_date' => array('type' => 'date'),
			'date_of_birth' => array('type' => 'date'),
			'sex' => array('constraint' => '"Male","Female"', 'type' => 'enum'),
			'marital_status' => array('constraint' => '"Single","Married","Divorced","Widowed"', 'type' => 'enum'),
			'activity_status' => array('constraint' => '"active","inactive"', 'type' => 'enum', 'default' => 'active'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('employees');
	}
}
