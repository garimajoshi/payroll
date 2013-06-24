
<?php

class Model_Access_Right extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'user_id',
        'print_salary_statement',
        'add_employee',
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
    protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'user_id',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => true,
        )
    );

    protected static $_table_name = 'access_rights';

}
