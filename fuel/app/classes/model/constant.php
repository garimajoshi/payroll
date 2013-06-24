
<?php

class Model_Constant extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'value',
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
	protected static $_table_name = 'constants';

        public static function validate($factory)
	{
		$val = Validation::forge($factory);

		//$val->add_field('value', 'Value', 'valid_string[numeric,dots]');
		
		return $val;
	}
}
