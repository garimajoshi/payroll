<?php

namespace Fuel\Migrations;

class Create_users {

    public function up() {
        \DBUtil::create_table('users', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primery key' => true),
            'name' => array('constraint' => 50, 'type' => 'varchar'),
            'password' => array('constraint' => 100, 'type' => 'varchar'),
            'last_login_at' => array('type' => 'timestamp'),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'datetime'),
                ), array('id'));
    }

    public function down() {
        \DBUtil::drop_table('users');
    }

}