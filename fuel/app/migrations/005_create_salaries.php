<?php

namespace Fuel\Migrations;

class Create_salaries
{
	public function up()
	{
		\DBUtil::create_table('salaries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'employee_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'month' => array('constraint' => '"jan","feb","mar","apr","jun","jul","aug","sep","oct","nov","dec"', 'type' => 'enum'),
			'year' => array('constraint' => 11, 'type' => 'int'),
                        'lock' => array('constraint' => '"true","false"', 'type' => 'enum'),
			'pf_applicable' => array('constraint' => '"yes","no"', 'type' => 'enum'),
			'gross' => array('constraint' => '10,2', 'type' => 'float'),
			'sdxo' => array('constraint' => '10,2', 'type' => 'float'),
			'pf_adjust' => array('constraint' => '10,2', 'type' => 'float'),
			'basic' => array('constraint' => '10,2', 'type' => 'float'),
			'hra' => array('constraint' => '10,2', 'type' => 'float'),
			'lta' => array('constraint' => '10,2', 'type' => 'float'),
			'medical' => array('constraint' => '10,2', 'type' => 'float'),
			'travel' => array('constraint' => '10,2', 'type' => 'float'),
			'pf_value' => array('constraint' => '10,2', 'type' => 'float'),
			'credit_other' => array('constraint' => '10,2', 'type' => 'float'),
			'bonus1' => array('constraint' => '10,2', 'type' => 'float'),
			'bonus2' => array('constraint' => '10,2', 'type' => 'float'),
                        'allowance1' => array('constraint' => '10,2', 'type' => 'float'),
			'leave' => array('constraint' => '10,2', 'type' => 'float'),
			'allowance2' => array('constraint' => '10,2', 'type' => 'float'),
			'allowance3' => array('constraint' => '10,2', 'type' => 'float'),
                        'credit_total' => array('constraint' => '10,2', 'type' => 'float'),
			'income_tax' => array('constraint' => '10,2', 'type' => 'float'),
                        'professional_tax' => array('constraint' => '10,2', 'type' => 'float'),
                        'deduction1' => array('constraint' => '10,2', 'type' => 'float'),
                        'deduction2' => array('constraint' => '10,2', 'type' => 'float'),
                        'deduction3' => array('constraint' => '10,2', 'type' => 'float'),
                        'total_debit' => array('constraint' => '10,2', 'type' => 'float'),
			'net' => array('constraint' => '10,2', 'type' => 'float'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('salaries');
	}
}
