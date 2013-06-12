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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('employee_id', 'Employee Id', 'required|valid_string[numeric]');
		$val->add_field('month', 'Month', 'required');
		$val->add_field('year', 'Year', 'required|valid_string[numeric]');
		$val->add_field('pf_applicable', 'Pf Applicable', 'required');
		$val->add_field('pf_date', 'Pf Date', 'required');
		$val->add_field('pf_scheme', 'Pf Scheme', 'required|max_length[255]');
		$val->add_field('pf_number', 'Pf Number', 'required|max_length[255]');
		$val->add_field('gross', 'Gross', 'required|valid_string[numeric]');
		$val->add_field('sdxo', 'Sdxo', 'required|valid_string[numeric]');
		$val->add_field('pf_adjust', 'Pf Adjust', 'required|valid_string[numeric]');
		$val->add_field('basic', 'Basic', 'required|valid_string[numeric]');
		$val->add_field('hra', 'Hra', 'required|valid_string[numeric]');
		$val->add_field('lta', 'Lta', 'required|valid_string[numeric]');
		$val->add_field('medical', 'Medical', 'required|valid_string[numeric]');
		$val->add_field('travel', 'Travel', 'required|valid_string[numeric]');
		$val->add_field('pf_value', 'Pf Value', 'required|valid_string[numeric]');
		$val->add_field('credit_other', 'Credit Other', 'required|valid_string[numeric]');
		$val->add_field('bonus1', 'Bonus1', 'required|valid_string[numeric]');
		$val->add_field('bonus2', 'Bonus2', 'required|valid_string[numeric]');
		$val->add_field('bonus3', 'Bonus3', 'required|valid_string[numeric]');
		$val->add_field('leave', 'Leave', 'required|valid_string[numeric]');
		$val->add_field('misc1', 'Misc1', 'required|valid_string[numeric]');
		$val->add_field('misc2', 'Misc2', 'required|valid_string[numeric]');
		$val->add_field('misc3', 'Misc3', 'required|valid_string[numeric]');
		$val->add_field('income_tax', 'Income Tax', 'required|valid_string[numeric]');
		$val->add_field('net', 'Net', 'required|valid_string[numeric]');

		return $val;
	}

}
