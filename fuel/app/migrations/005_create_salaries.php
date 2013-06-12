<?php

namespace Fuel\Migrations;

class Create_salaries
{
	public function up()
	{
		\DBUtil::create_table('salaries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'employee_id' => array('constraint' => 11, 'type' => 'int'),
			'month' => array('constraint' => '"jan","feb","mar","apr","jun","jul","aug","sep","oct","nov","dec"', 'type' => 'enum'),
			'year' => array('constraint' => 11, 'type' => 'int'),
			'pf_applicable' => array('constraint' => '"yes","no"', 'type' => 'enum'),
			'pf_date' => array('type' => 'date'),
			'pf_scheme' => array('constraint' => 255, 'type' => 'varchar'),
			'pf_number' => array('constraint' => 255, 'type' => 'varchar'),
			'gross' => array('constraint' => 11, 'type' => 'int'),
			'sdxo' => array('constraint' => 11, 'type' => 'int'),
			'pf_adjust' => array('constraint' => 11, 'type' => 'int'),
			'basic' => array('constraint' => 11, 'type' => 'int'),
			'hra' => array('constraint' => 11, 'type' => 'int'),
			'lta' => array('constraint' => 11, 'type' => 'int'),
			'medical' => array('constraint' => 11, 'type' => 'int'),
			'travel' => array('constraint' => 11, 'type' => 'int'),
			'pf_value' => array('constraint' => 11, 'type' => 'int'),
			'credit_other' => array('constraint' => 11, 'type' => 'int'),
			'bonus1' => array('constraint' => 11, 'type' => 'int'),
			'bonus2' => array('constraint' => 11, 'type' => 'int'),
			'bonus3' => array('constraint' => 11, 'type' => 'int'),
			'leave' => array('constraint' => 11, 'type' => 'int'),
			'misc1' => array('constraint' => 11, 'type' => 'int'),
			'misc2' => array('constraint' => 11, 'type' => 'int'),
			'misc3' => array('constraint' => 11, 'type' => 'int'),
			'income_tax' => array('constraint' => 11, 'type' => 'int'),
			'net' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('salaries');
	}
}