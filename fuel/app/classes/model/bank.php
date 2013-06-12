<?php
use Orm\Model;

class Model_Bank extends Model
{
	protected static $_properties = array(
		'id',
		'employee_id',
		'account_no',
		'account_type',
		'branch',
		'city',
		'state',
		'ifsc_code',
		'payment_type',
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
		$val->add_field('account_no', 'Account No', 'required|valid_string[numeric]');
		$val->add_field('account_type', 'Account Type', 'required');
		$val->add_field('branch', 'Branch', 'required|max_length[255]');
		$val->add_field('city', 'City', 'required|max_length[255]');
		$val->add_field('state', 'State', 'required|max_length[255]');
		$val->add_field('ifsc_code', 'Ifsc Code', 'required|max_length[255]');
		$val->add_field('payment_type', 'Payment Type', 'required|max_length[255]');

		return $val;
	}

}
