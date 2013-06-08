
<?php

class Model_Leave extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'eid',
		'date',
		'reason',
		'type',
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
	protected static $_table_name = 'leaves';
    
    protected static $_belongs_to = array('employees' => array(
        'model_to' => 'Model_Employee',
        'key_from' => 'eid',
        'key_to' => 'emp_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    ));
}
