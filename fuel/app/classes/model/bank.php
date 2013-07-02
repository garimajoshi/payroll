<?php

use Orm\Model;

class Model_Bank extends Model {

    protected static $_properties = array(
        'id',
        'employee_id',
        'account_no',
        'account_type',
        'branch',
        'city',
        'state',
        'ifsc_code',
        'payment_type',
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
    protected static $_table_name = 'banks';
    protected static $_belongs_to = array('employee' /* => array(
              'model_to' => 'Model_Employee',
              'key_to' => 'id',
              'key_from' => 'employee_id',
              'cascade_save' => true,
              'cascade_delete' => false,
              ) */);

    public static function validate($factory) {
        $val = Validation::forge($factory);
        //$val->add_field('account_no', 'Account No', 'required|max_length[255]|valid_string[numeric]');
        //$val->add_field('branch', 'Branch', 'required|max_length[255]|valid_string[alpha,dots,numeric,spaces,dashes]');
        //$val->add_field('city', 'City', 'required|max_length[255]|valid_string[alpha,numeric,spaces]');
        //$val->add_field('ifsc_code', 'IFSC Code', 'required|max_length[255]|match_pattern[#[A-Z|a-z]{4}[0][\d]{6}$#]');
        return $val;
    }

}
