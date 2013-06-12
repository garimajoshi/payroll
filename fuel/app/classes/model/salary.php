<?php
use Orm\Model;

class Model_Salary extends Model
{
	protected static $_properties = array(
		'id',
		'employee_id',
		'month',
		'year',
		'pf_applicable',
		'pf_date',
		'pf_scheme',
		'pf_number',
		'gross',
		'sdxo',
		'pf_adjust',
		'basic',
		'hra',
		'lta',
		'medical',
		'travel',
		'pf_value',
		'credit_other',
		'bonus1',
		'bonus2',
		'bonus3',
		'leave',
		'misc1',
		'misc2',
		'misc3',
		'income_tax',
		'net',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'salaries';
	
	protected static $_belongs_to = array('employees' => array(
    		'model_to' => 'Model_Employee',
        	'key_from' => 'employee_id',
        	'key_to' => 'id',
        	'cascade_save' => true,
        	'cascade_delete' => true,
    	));
		
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('month', 'Month', 'required');
		$val->add_field('year', 'Year', 'required|valid_string[numeric]');
		$val->add_field('pf_applicable', 'Pf Applicable', 'required');
		$val->add_field('pf_date', 'Pf Date');
		$val->add_field('pf_scheme', 'Pf Scheme');
		$val->add_field('pf_number', 'Pf Number', 'max_length[20]');
		$val->add_field('gross', 'Gross', 'required|valid_string[numeric]');
		$val->add_field('sdxo', 'Sdxo', 'valid_string[numeric]');
		$val->add_field('bonus1', 'Bonus1', 'valid_string[numeric]');
		$val->add_field('bonus2', 'Bonus2', 'valid_string[numeric]');
		$val->add_field('bonus3', 'Bonus3', 'valid_string[numeric]');
		$val->add_field('leave', 'Leave', 'valid_string[numeric]');
		$val->add_field('misc1', 'Misc1', 'valid_string[numeric]');
		$val->add_field('misc2', 'Misc2', 'valid_string[numeric]');
		$val->add_field('misc3', 'Misc3', 'valid_string[numeric]');
		
		return $val;
	}

}
