<?php

namespace Fuel\Migrations;

class Create_constants {

    public function up() {
        \DBUtil::create_table('constants', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'name' => array('constraint' => 255, 'type' => 'varchar'),
            'value' => array('constraint' => '10,4', 'type' => 'float'),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'timestamp'),
                ), array('id'));
    }

    public function down() {
        \DBUtil::drop_table('constants');
    }

}