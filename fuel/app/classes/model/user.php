<?php

class Model_User extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'name',
        'password',
        'last_login_at' => array(
            'data_type' => 'timestamp',
        ),
        'access_level',
        'created_at',
        'updated_at',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => true,
        ),
    );
    protected static $_has_one = array('access_right',
        array(
            'key_from' => 'id',
            'key_to' => 'user_id',
            'model_to' => 'Model_Access_right',
            'cascade_save' => false,
        )
    );
	
    protected static $_table_name = 'users';
    protected static $_primary_key = array('id');

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('name', 'Username(only alphabets and numbers)', 'required|valid_string[alpha,numeric]');
        $val->add_field('password', 'Password should be of minimum 3 characters(only alphabets and numbers)', 'required|min_length[3]|max_length[20]|valid_string[alpha,numeric]');

        return $val;
    }

}
