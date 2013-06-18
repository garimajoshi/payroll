<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'password',
		'last_login_at' => array(
            'data_type' => 'timestamp',
        ),
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

	protected static $_belongs_to = array('access_right' => array(
        	'key_from' => 'user_id',
        	'key_to' => 'id',
    	));

	protected static $_table_name = 'users';
	protected static $_primary_key = array('id');
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('username', 'Username', 'required|min_length[3]|max_length[100]');
		$val->add_field('password', 'Password', 'required|min_length[3]|max_length[100]');

		return $val;
	}

}