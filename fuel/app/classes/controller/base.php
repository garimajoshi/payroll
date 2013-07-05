<?php

use \Fuel\Core\Response;
use \Fuel\Core\Session;

class Controller_Base extends Controller_Template {

    protected static function do_login($user) {
        Session::set('user', $user);
        $time = date('Y-m-d H:i:s');
        $user->last_login_at = $time;
        $user->save();
    }

    protected function logout_user() {
        Session::destroy();
    }

    protected function has_access($page) {
        $user = Session::get('user');
        $access = Model_Access_Right::find('first', array('where' => array('page' => $page)));
        $ac = $user->access_level;
        if ($access->$ac == 0) {
            Session::set_flash('error', 'Sorry! You do not have access to this page.');
            Response::redirect('welcome');
        }
    }

}

?>