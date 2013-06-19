<?php

class Controller_Login extends Controller_Base {

    public function action_index() {
        if(!parent::access('print_invoice')) {
            Response::redirect('login/logout');
           
        }
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'My &raquo; Index';
        $rights = Model_Access_Right::find('all', array('related' => array('user')));
        $data['rights'] = $rights;
        $this->template->content = View::forge('login/index', $data);
    }

    public function action_login() {
        $this->template->title = 'My &raquo; Login';
        if (Session::get('user') == NULL)
            $this->template->content = View::forge('login/login');
        else
            Response::redirect('archive/view');
    }

    public function action_verify() {
        $this->template->title = 'My &raquo; Login';
        if (!Input::post()) {
            Response::redirect('login/index');
        }
        $name = Input::post('name');
        $password = Input::post('password');
        $user = Model_User::find('first', array(
                    'where' => array(
                        array('name', $name),
                        array('password', $password),
                    ),
        ));
        if (!$user) {
            Session::set_flash('error', 'Invalid username or password');
            $this->template->content = View::forge('login/login');
        }
        else {
            $data['user'] = $user;
            View::set_global('current_user', $user);
            Session::set_flash('Success', 'Login Successful');

            $data["subnav"] = array('index' => 'active');

            parent::do_login($user);
            $this->template->content = View::forge('login/index', $data);
        }
        //print_r($user);
    }

    public function action_logout() {
        $this->template->title = 'My &raquo; Login';
        parent::logout_user();
        Session::set_flash('success', 'You have successfully logged out!');
        $this->template->content = View::forge('login/logout');
    }

}