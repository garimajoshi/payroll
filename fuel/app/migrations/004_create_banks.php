<?php

namespace Fuel\Migrations;

class Create_banks {

    public function up() {
        \DBUtil::create_table('banks', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'employee_id' => array('constraint' => 10, 'type' => 'varchar'),
            'account_no' => array('constraint' => 255, 'type' => 'varchar'),
            'account_type' => array('constraint' => '"current","saving"', 'type' => 'enum'),
            'branch' => array('constraint' => 255, 'type' => 'varchar'),
            'city' => array('constraint' => 255, 'type' => 'varchar'),
            'state' => array('constraint' => 255, 'type' => 'varchar'),
            'ifsc_code' => array('constraint' => 255, 'type' => 'varchar'),
            'payment_type' => array('constraint' => 255, 'type' => 'varchar'),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'timestamp'),
                ), array('id'));
    }

    public function down() {
        \DBUtil::drop_table('banks');
    }

}
