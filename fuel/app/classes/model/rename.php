
<?php

class Model_Rename extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'bonus1',
		'bonus2',
		'allowance1',
		'allowance2',
                'allowance3',
                'deduction1',
                'deduction2',
                'deduction3',
	);

/*	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);*/
//        protected static $_primary_key = 'id';
	protected static $_table_name = 'rename';

}
