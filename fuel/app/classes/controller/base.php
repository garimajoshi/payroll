<?php

use \Fuel\Core\Session;

class Controller_Base extends Controller_Template {

    protected function access($module) {
        $user = Session::get('user');
        if ($user) {
            $right = Model_Access_Right::find('first', array(
                        'where' => array('user_id' => $user->id),
                            )
            );
            return $right[$module];
        }
    }

    protected static function do_login($user) {
        Session::set('user', $user);
    }

    protected function logout_user() {
        Session::destroy();
    }

}

?>
