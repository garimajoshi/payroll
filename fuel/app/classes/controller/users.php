<?php

class Controller_Users extends Controller_Base {

    public function action_index() {
        $data['users'] = Model_User::find('all');
        $this->template->title = "Users";
        $this->template->content = View::forge('users/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('users');

        if (!$data['user'] = Model_User::find($id)) {
            Session::set_flash('error', 'Could not find user #' . $id);
            Response::redirect('users');
        }

        $this->template->title = "User";
        $this->template->content = View::forge('users/view', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_User::validate('create');

            if ($val->run()) {
                $user = new Model_User();
                $user->name = Input::post('name');
                $user->password = Input::post('password');

                $user->access_right = new Model_Access_Right();
                $user->access_right->print_salary_statement = Input::post('print_salary_statement');
                $user->access_right->add_employee = Input::post('add_employee');
                $user->access_right->delete_employee = Input::post('delete_employee');
                $user->access_right->change_salary_constants = Input::post('change_salary_constants');
                $user->access_right->add_leave = Input::post('add_leave');

                if ($user and $user->save()) {
                    Session::set_flash('success', 'Added user #' . $user->id . '.');

                    Response::redirect('users');
                } else {
                    Session::set_flash('error', 'Could not save user.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Users";
        $this->template->content = View::forge('users/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('users');

        if (!$user = Model_User::find($id)) {
            Session::set_flash('error', 'Could not find user #' . $id);
            Response::redirect('users');
        }

        $access_right = Model_Access_Right::find('first', array(
                    'where' => array('user_id' => $id)
        ));
        if (!$access_right)
            die('User ID not found!');


        $user->access_right->print_salary_statement = Input::post('print_salary_statement');
        $user->access_right->add_employee = Input::post('add_employee');
        $user->access_right->delete_employee = Input::post('delete_employee');
        $user->access_right->change_salary_constants = Input::post('change_salary_constants');
        $user->access_right->add_leave = Input::post('add_leave');
        $res = $access_right->save();
        if ($res) {
            Session::set_flash('Permissions changed successfully!');
            Response::redirect('users');
        }

        $this->template->title = "Users";
        $this->template->content = View::forge('users/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('users');

        if ($user = Model_User::find($id)) {
            $user->delete();

            Session::set_flash('success', 'Deleted user #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete user #' . $id);
        }

        Response::redirect('users');
    }

}
