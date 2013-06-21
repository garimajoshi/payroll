<?php

use Orm\Model;

class Model_Employee extends Model {

    protected static $_properties = array(
        'id',
        'branch',
        'first_name',
        'last_name',
        'branch',
        'phone',
        'address',
        'city',
        'state',
        'pincode',
        'email',
        'joining_date',
        'leaving_date',
        'date_of_birth',
        'sex',
        'marital_status',
        'activity_status',
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
    protected static $_table_name = 'employees';
    protected static $_has_one = array('bank' => array(
            'model_to' => 'Model_Bank',
            'key_from' => 'id',
            'key_to' => 'employee_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
    );
    protected static $_has_many = array('salaries' => array(
            'model_to' => 'Model_Salary',
            'key_from' => 'id',
            'key_to' => 'employee_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        'leaves' => array(
            'model_to' => 'Model_Leave',
            'key_from' => 'id',
            'key_to' => 'employee_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
    );

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('first_name', 'First Name', 'required|max_length[255]');
        $val->add_field('last_name', 'Last Name', 'required|max_length[255]');
        $val->add_field('phone', 'Phone', 'required');
        $val->add_field('address', 'Address', 'max_length[255]');
        $val->add_field('city', 'City', 'required|max_length[255]');
        $val->add_field('state', 'State', 'required|max_length[255]');
        $val->add_field('pincode', 'Pincode','required');
        $val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
        $val->add_field('joining_date', 'Joining Date', 'required');
        $val->add_field('date_of_birth', 'Date Of Birth', 'required');

        return $val;
    }

}
