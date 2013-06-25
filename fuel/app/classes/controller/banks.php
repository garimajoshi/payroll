<?php

class Controller_Banks extends Controller_Base {

    public function action_index() {
        $data['banks'] = Model_Bank::find('all');
        $this->template->title = "Banks";
        $this->template->content = View::forge('banks/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('banks');

        if (!$data['bank'] = Model_Bank::find($id)) {
            Session::set_flash('error', 'Could not find bank #' . $id);
            Response::redirect('banks');
        }

        $this->template->title = "Bank";
        $this->template->content = View::forge('banks/view', $data);
    }

    public function action_create($id = null) {
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

                    Response::redirect('banks');
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
        is_null($id) and Response::redirect('banks');

        if (!$bank = Model_Bank::find($id)) {
            Session::set_flash('error', 'Could not find bank #' . $id);
            Response::redirect('banks');
        }

        $val = Model_Bank::validate('edit');

        if ($val->run()) {
            $bank->employee_id = Input::post('id');
            $bank->account_no = Input::post('account_no');
            $bank->account_type = Input::post('account_type');
            $bank->branch = Input::post('branch');
            $bank->city = Input::post('city');
            $bank->state = Input::post('state');
            $bank->ifsc_code = Input::post('ifsc_code');
            $bank->payment_type = Input::post('payment_type');

            if ($bank->save()) {
                Session::set_flash('success', 'Updated bank #' . $id);

                Response::redirect('banks');
            } else {
                Session::set_flash('error', 'Could not update bank #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $bank->employee_id = $val->validated('id');
                $bank->account_no = $val->validated('account_no');
                $bank->account_type = $val->validated('account_type');
                $bank->branch = $val->validated('branch');
                $bank->city = $val->validated('city');
                $bank->state = $val->validated('state');
                $bank->ifsc_code = $val->validated('ifsc_code');
                $bank->payment_type = $val->validated('payment_type');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('bank', $bank, false);
        }

        $this->template->title = "Banks";
        $this->template->content = View::forge('banks/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('banks');

        if ($bank = Model_Bank::find($id)) {
            $bank->delete();

            Session::set_flash('success', 'Deleted bank #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete bank #' . $id);
        }

        Response::redirect('banks');
    }

}
