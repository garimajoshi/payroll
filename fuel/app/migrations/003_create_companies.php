<?php

namespace Fuel\Migrations;

class Create_companies {

    public function up() {
        \DBUtil::create_table('companies', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'company_name' => array('constraint' => 255, 'type' => 'varchar'),
            'address' => array('constraint' => 255, 'type' => 'varchar'),
            'city' => array('constraint' => 255, 'type' => 'varchar'),
            'state' => array('constraint' => 255, 'type' => 'varchar'),
            'country' => array('constraint' => 255, 'type' => 'varchar'),
            'pincode' => array('constraint' => 11, 'type' => 'int'),
            'email' => array('constraint' => 255, 'type' => 'varchar'),
            'website' => array('constraint' => 255, 'type' => 'varchar'),
            'phone' => array('constraint' => 255, 'type' => 'varchar'),
            'fax' => array('constraint' => 255, 'type' => 'varchar'),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'timestamp'),
                ), array('id'));
    }

    public function down() {
        \DBUtil::drop_table('companies');
    }

}