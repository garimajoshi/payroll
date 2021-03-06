<?php

class Controller_Login extends Controller_Base {

    public function action_index() {

        $this->template->title = 'Payroll &raquo; Login';
        Response::redirect('employees');
    }

    public function action_login() {
        $this->template->title = 'Payroll &raquo; Login';
        if (Session::get('user') == NULL)
            return Response::forge(View::forge('login/login'));
        else
            Response::redirect('/');
    }

    public function action_verify() {
        $this->template->title = 'Payroll &raquo; Verify';
        if (!Input::post()) {
            Response::redirect('login/login');
        }
        $name = Input::post('name');
        $password = Input::post('password');
        $user = Model_User::find('first', array(
                    'where' => array(
                        array('name', $name),
                        array('password', md5($password)),
                    ),
        ));

        if (!$user) {
            Session::set_flash('error', 'Invalid username or password');
            return Response::forge(View::forge('login/login'));
        } else {
            $data['user'] = $user;
            View::set_global('current_user', $user);
            Session::set_flash('Success', 'Login Successful');

            $data["subnav"] = array('index' => 'active');

            parent::do_login($user);
            Response::redirect('/');
        }
    }

    public function action_logout() {
        $this->template->title = 'Payroll &raquo; Login';
        if (Session::get('user') !== NULL) {
            parent::logout_user();
            Session::set_flash('success', 'You have successfully logged out!');
            $this->template->content = View::forge('login/logout');
        } else {
            Response::redirect('login/login');
        }
    }

}