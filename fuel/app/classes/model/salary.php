
<?php

class Model_Salary extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'eid',
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
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'salaries';

    protected static $_belongs_to = array('employees' => array(
        'model_to' => 'Model_Employee',
        'key_from' => 'eid',
        'key_to' => 'emp_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    ));
}
