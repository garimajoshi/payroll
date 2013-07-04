<?php

class Controller_Users extends Controller_Base {

    public function action_index() {
        //parent::has_access("add_user");
        $data['users'] = Model_User::find('all');
        $this->template->title = "Users";
        $this->template->content = View::forge('users/index', $data);
    }

    public function action_access() {
        //parent::has_access("add_user");

        $data['accesses'] = Model_Access_Right::find('all');
        $this->template->title = "Access Rights";
        $this->template->content = View::forge('users/access', $data);
    }

    public function action_accessSubmit() {
        //parent::has_access("add_user");
        if (Input::method() == 'POST') {

            $page = Input::post('page');

            $mod1 = Model_Access_Right::find('first', array('where' => array('page' => $page)));
            $mod1->mod1 = Input::post('moderator1');
            $mod1->save();

            $mod2 = Model_Access_Right::find('first', array('where' => array('page' => $page)));
            $mod2->mod2 = Input::post('moderator2');
            $mod2->save();

            $user = Model_Access_Right::find('first', array('where' => array('page' => $page)));
            $user->user = Input::post('user');
            $user->save();

            Response::redirect('users/access');
        }
    }

    public function action_view($id = null) {
        //parent::has_access("add_user");
        is_null($id) and Response::redirect('users');

        if (!$data['user'] = Model_User::find($id)) {
            Session::set_flash('error', 'Could not find user #' . $id);
            Response::redirect('users');
        }

        $this->template->title = "User";
        $this->template->content = View::forge('users/view', $data);
    }

    public function action_create() {
        //parent::has_access("add_user");
        if (Input::method() == 'POST') {
            $val = Model_User::validate('create');

            if ($val->run()) {
                $user = Model_User::forge(array(
                            'name' => Input::post('username'),
                            'password' => md5(Input::post('password')),
                            'access_level' => Input::post('access_level')
                ));
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
        //parent::has_access("add_user");
        is_null($id) and Response::redirect('users');
        $data['user'] = Model_User::find('first', array('where' => array('id' => $id)));
        if (!$user = Model_User::find($id)) {
            Session::set_flash('error', 'Could not find user #' . $id);
            Response::redirect('users');
        }

        if (Input::method() == 'POST') {
            $user->access_level = Input::post('access_level');

            if ($user->save()) {
                $this->template->set_global('user', $user, false);
                Session::set_flash('success', 'Updated user #' . $id);
                Response::redirect('users');
            } else {
                Session::set_flash('error', 'Could not update user #' . $id);
            }
        }
        $this->template->title = "Edit User";
        $this->template->content = View::forge('users/edit', $data);
    }

    public function action_password() {

        $u = Session::get('user');
        is_null($u) and Response::redirect('users');

        if (!$user = Model_User::find($u->id)) {
            Session::set_flash('error', 'User does not exist #' . $u->id);
            Response::redirect('users');
        }

        if (Input::method() == 'POST') {

            if ($user->password != md5(Input::post('old_password'))) {
                Session::set_flash('error', 'Old password does not match');
                Response::redirect('users/password');
            }
            else
                $user->password = md5(Input::post('password'));

            if ($user->save()) {
                Session::set_flash('success', 'Password updated successfully');

                Response::redirect('users');
            } else {
                Session::set_flash('error', 'Could not update password');
            }
        }

        $this->template->title = "Change Password";
        $this->template->content = View::forge('users/password');
    }

    public function action_delete($id = null) {
        //parent::has_access("add_user");
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