
<?php

class Model_Employee extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'emp_id',
		'name',
		'designation',
		'phone',
		'address',
		'city',
		'state',
		'pincode',
		'email',
		'joining_date',
		'date_of_birth',
		'sex',
		'marital_status',
		'activity_status',
		'created_at',
		'updated_at',
	);

    protected static $_primary_key = array('emp_id');
	
    protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'employees';
    
    protected static $_has_one = array('salaries' => array(
        'model_to' => 'Model_Salary',
        'key_from' => 'emp_id',
        'key_to' => 'eid',
        'cascade_save' => true,
        'cascade_delete' => true,
    ));
    
    protected static $_has_one = array('leaves' => array(
        'model_to' => 'Model_Leave',
        'key_from' => 'emp_id',
        'key_to' => 'eid',
        'cascade_save' => true,
        'cascade_delete' => true,
    ));

    protected static $_has_one = array('banks' => array(
        'model_to' => 'Model_Bank',
        'key_from' => 'emp_id',
        'key_to' => 'eid',
        'cascade_save' => true,
        'cascade_delete' => true,
    ));
}
