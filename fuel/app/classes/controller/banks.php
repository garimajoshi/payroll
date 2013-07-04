<?php

class Controller_Banks extends Controller_Base {

    public function action_index() {
        //parent::has_access("create_employee");
        $data['banks'] = Model_Bank::find('all');
        $this->template->title = "Banks";
        $this->template->content = View::forge('banks/index', $data);
    }

    public function action_view($id = null) {
        //parent::has_access("create_employee");
        is_null($id) and Response::redirect('banks');

        if (!$data['bank'] = Model_Bank::find($id)) {
            Session::set_flash('error', 'Could not find bank #' . $id);
            Response::redirect('banks');
        }

        $this->template->title = "Bank";
        $this->template->content = View::forge('banks/view', $data);
    }

    public function action_create($id = null) {
        //parent::has_access("create_employee");
        if (Input::method() == 'POST') {
            $val = Model_Bank::validate('create');

            if ($val->run()) {
                $bank = Model_Bank::forge(array(
                            'employee_id' => $id,
                            'account_no' => Input::post('account_no'),
                            'account_type' => Input::post('account_type'),
                            'branch' => Input::post('branch'),
                            'city' => Input::post('city'),
                            'state' => Input::post('state'),
                            'ifsc_code' => Input::post('ifsc_code'),
                            'payment_type' => Input::post('payment_type'),
                ));

                if ($bank and $bank->save()) {
                    Session::set_flash('success', 'Added bank #' . $bank->id . '.');

                    Response::redirect('employees');
                } else {
                    Session::set_flash('error', 'Could not save bank.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Banks";
        $this->template->content = View::forge('banks/create');
    }

    public function action_edit($id = null) {
        //parent::has_access("create_employee");
        is_null($id) and Response::redirect('employees/view' . $id);

        if (!$bank = Model_Bank::find('first', array('where' => array('employee_id' => $id)))) {
            Session::set_flash('error', 'Could not find user #' . $id);
            Response::redirect('employees/view/' . $id);
        }

        if (Input::method() == 'POST') {
            $bank->account_no = Input::post('account_no');
            $bank->account_type = Input::post('account_type');
            $bank->branch = Input::post('branch');
            $bank->city = Input::post('city');
            $bank->state = Input::post('state');
            $bank->ifsc_code = Input::post('ifsc_code');
            $bank->payment_type = Input::post('payment_type');
            if ($bank->save()) {
                Session::set_flash('success', 'Updated bank details #' . $id);

                Response::redirect('employees/view/' . $id);
            } else {
                Session::set_flash('error', 'Could not update bank #' . $id);
            }
        }

        $this->template->title = "Banks";
        $this->template->content = View::forge('banks/edit');
    }

}
