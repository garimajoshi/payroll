<?php
use Orm\Model;

class Model_Salary extends Model
{
	protected static $_properties = array(
		'id',
                'employee_id',
		'month',
		'year',
                'lock',
		'pf_applicable',
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
		'allowance1',
		'leave',
		'allowance2',
		'allowance3',
		'credit_total',
		'income_tax',
		'professional_tax',
                'deduction1',
                'deduction2',
                'deduction3',
                'total_debit',
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
	
	protected static $_belongs_to = array('employee' => array(
    		'model_to' => 'Model_Employee',
        	'key_from' => 'employee_id',
        	'key_to' => 'id',
        	'cascade_save' => true,
        	'cascade_delete' => false,
    	));
		
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		//$val->add_field('month', 'Month', 'required');
		//$val->add_field('year', 'Year', 'required|valid_string[numeric]');
		//$val->add_field('gross', 'Gross', 'required');
		
		return $val;
	}

}
