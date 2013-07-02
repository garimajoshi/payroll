<?php

use Orm\Model;

class Model_Leave extends Model {

    protected static $_properties = array(
        'id',
        'employee_id',
        'date_of_leave',
        'time',
        'type',
        'created_at',
        'updated_at',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
        ),
    );
    protected static $_table_name = 'leaves';
    protected static $_belongs_to = array('employee' => array(
            'model_to' => 'Model_Employee',
            'key_from' => 'employee_id',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
    ));

    public static function validate($factory) {
        $val = Validation::forge($factory);
        //$val->add_field('date_of_leave', 'Date Of Leave', 'required|valid_date');
        //$val->add_field('reason', 'Reason', 'max_length[255]');
        //$val->add_field('type', 'Type', 'required');

        return $val;
    }

}
