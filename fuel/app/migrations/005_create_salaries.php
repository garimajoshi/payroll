<?php

namespace Fuel\Migrations;

class Create_salaries
{
	public function up()
	{
		\DBUtil::create_table('salaries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'employee_id' => array('constraint' => 10, 'type' => 'varchar'),
			'month' => array('constraint' => '"jan","feb","mar","apr","jun","jul","aug","sep","oct","nov","dec"', 'type' => 'enum'),
			'year' => array('constraint' => 11, 'type' => 'int'),
                        'lock' => array('constraint' => '"true","false"', 'type' => 'enum'),
			'pf_applicable' => array('constraint' => '"1","0"', 'type' => 'enum'),
			'gross' => array('constraint' => '10,2', 'type' => 'float', 'null' => false),
			'sdxo' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'pf_adjust' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'basic' => array('constraint' => '10,2', 'type' => 'float'),
			'hra' => array('constraint' => '10,2', 'type' => 'float'),
			'lta' => array('constraint' => '10,2', 'type' => 'float'),
			'medical' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'travel' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'pf_value' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'credit_other' => array('constraint' => '10,2', 'type' => 'float'),
			'bonus1' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'bonus2' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'allowance1' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'leave' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'allowance2' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'allowance3' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'credit_total' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'income_tax' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'professional_tax' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'deduction1' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'deduction2' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'deduction3' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
                        'total_debit' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'net' => array('constraint' => '10,2', 'type' => 'float', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('salaries');
	}
}
