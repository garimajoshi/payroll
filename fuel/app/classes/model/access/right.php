
<?php

class Model_Access_Right extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'page',
        'admin',
        'mod1',
        'mod2',
        'user',
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
