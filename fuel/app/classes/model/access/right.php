
<?php

class Model_Access_Right extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'user_id',
        'add_employee',
        'archive_employee',
        'make_payroll',
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
    protected static $_has_one = array(
        'user' => array(
            'key_from' => 'user_id',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    protected static $_table_name = 'access_rights';

}