<?php

use Orm\Model;

class Model_Company extends Model {

    protected static $_properties = array(
        'id',
        'address1',
        'address2',
        'address3',
        'city',
        'state',
        'country',
        'pincode',
        'email',
        'website',
        'phone',
        'fax',
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

    public static function validate($factory) {
        $val = Validation::forge($factory);
        //$val->add_field('company_name', 'Company Name', 'required|max_length[255]');
        //$val->add_field('address', 'Address', 'required|max_length[255]');
        //$val->add_field('city', 'City', 'required|max_length[255]|valid_string[alpha]');
        //$val->add_field('state', 'State', 'required|max_length[255]|valid_string[alpha]');
        //$val->add_field('pincode', 'Pincode', 'required|valid_string[numeric]|max_length[6]');
        //$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
        //$val->add_field('website', 'Website', 'required|max_length[255]|valid_string[alpha,dots]');
        //$val->add_field('phone', 'Phone', 'required|match_pattern[#^((\\+91-?)|0)?[0-9]{10}$#]');
        //$val->add_field('phone', 'Phone', 'required|match_pattern[#^((\\+91-?)|0)?[0-9]{10}$#]');

        return $val;
    }

}