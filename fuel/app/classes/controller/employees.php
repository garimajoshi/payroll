<?php

class Controller_Employees extends Controller_Base {

    public function action_index() {
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('employees');
        $data['employees'] = Model_Employee::find('all', array('where' => array('id' => $id),
                    'related' => array('bank')));
        if (!$data['employee'] = Model_Employee::find($id)) {
            Session::set_flash('error', 'Could not find employee #' . $id);
            Response::redirect('employees');
        }

        $this->template->title = "Employee";
        $this->template->content = View::forge('employees/view', $data);
    }

    public function action_view_archive() {
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "inactive")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/view/archive', $data);
    }

    public function action_search() {

        $query = Input::get('q');

        if (isset($query)) {
            Session::set('query', $query);
        } else {
            $query = Session::get('query');
        }

        $data['employees'] = Model_Employee::find('all', array(
                    'where' => array(
                        array(
                            array('id', 'like', '%' . $query . '%'),
                            'or' => array(
                                array('first_name', 'like', '%' . $query . '%'),
                                'or' => array(
                                    array('last_name', 'like', '%' . $query . '%'),
                                )
                            )
                        )
                    ),
                    'order_by' => array(
                        ('id'),
                    ),
                        )
        );
        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/search', $data);
    }

    public function action_create() {
        if (Input::method() == 'POST') {
            $val = Model_Employee::validate('create');

            if ($val->run()) {

                $var_dob_day = Input::post('dob_day');
                $var_dob_month = Input::post('dob_month');
                $var_dob_year = Input::post('dob_year');
                $var_dob = $var_dob_year . '-' . $var_dob_month . '-' . $var_dob_day;
                $var_jd_day = Input::post('jd_day');
                $var_jd_month = Input::post('jd_month');
                $var_jd_year = Input::post('jd_year');
                $var_jd = $var_jd_year . '-' . $var_jd_month . '-' . $var_jd_day;
                $var_ld_day = Input::post('ld_day');
                $var_ld_month = Input::post('ld_month');
                $var_ld_year = Input::post('ld_year');
                $var_ld = $var_ld_year . '-' . $var_ld_month . '-' . $var_ld_day;

                $employee = Model_Employee::forge(array(
                            'id' => Input::post('id'),
                            'branch' => Input::post('branch'),
                            'title' => Input::post('title'),
                            'first_name' => Input::post('first_name'),
                            'last_name' => Input::post('last_name'),
                            'phone' => Input::post('phone'),
                            'address' => Input::post('address'),
                            'city' => Input::post('city'),
                            'state' => Input::post('state'),
                            'pincode' => Input::post('pincode'),
                            'email' => Input::post('email'),
                            'joining_date' => $var_jd,
                            'leaving_date' => $var_ld,
                            'date_of_birth' => $var_dob,
                            'sex' => Input::post('sex'),
                            'marital_status' => Input::post('marital_status'),
                            'activity_status' => "active",
                ));

                if ($employee and $employee->save()) {
                    Session::set_flash('success', 'Added employee #' . $employee->id . '.');

                    Response::redirect('/banks/create/' . $employee->id);
                } else {
                    Session::set_flash('error', 'Could not save employee.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('employees');

        if (!$employee = Model_Employee::find($id)) {
            Session::set_flash('error', 'Could not find employee #' . $id);
            Response::redirect('employees');
        }

        $val = Model_Employee::validate('edit');

        if ($val->run()) {
            $var_dob_day = Input::post('dob_day');
            $var_dob_month = Input::post('dob_month');
            $var_dob_year = Input::post('dob_year');
            $var_dob = $var_dob_year . '-' . $var_dob_month . '-' . $var_dob_day;
            $var_jd_day = Input::post('jd_day');
            $var_jd_month = Input::post('jd_month');
            $var_jd_year = Input::post('jd_year');
            $var_jd = $var_jd_year . '-' . $var_jd_month . '-' . $var_jd_day;
            $var_ld_day = Input::post('ld_day');
            $var_ld_month = Input::post('ld_month');
            $var_ld_year = Input::post('ld_year');
            $var_ld = $var_ld_year . '-' . $var_ld_month . '-' . $var_ld_day;

            $employee->branch = Input::post('branch');
            $employee->title = Input::post('title');
            $employee->first_name = Input::post('first_name');
            $employee->last_name = Input::post('last_name');
            $employee->phone = Input::post('phone');
            $employee->address = Input::post('address');
            $employee->city = Input::post('city');
            $employee->state = Input::post('state');
            $employee->pincode = Input::post('pincode');
            $employee->email = Input::post('email');
            $employee->joining_date = $var_jd;
            $employee->leaving_date = $var_ld;
            $employee->date_of_birth = $var_dob;
            $employee->sex = Input::post('sex');
            $employee->marital_status = Input::post('marital_status');
            $employee->activity_status = "active";

            if ($employee->save()) {
                Session::set_flash('success', 'Updated employee #' . $id);

                Response::redirect('employees');
            } else {
                Session::set_flash('error', 'Could not update employee #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {

                $var_dob_day = Input::post('dob_day');
                $var_dob_month = Input::post('dob_month');
                $var_dob_year = Input::post('dob_year');
                $var_dob = $var_dob_year . '-' . $var_dob_month . '-' . $var_dob_day;
                $var_jd_day = Input::post('jd_day');
                $var_jd_month = Input::post('jd_month');
                $var_jd_year = Input::post('jd_year');
                $var_jd = $var_jd_year . '-' . $var_jd_month . '-' . $var_jd_day;
                $var_ld_day = Input::post('ld_day');
                $var_ld_month = Input::post('ld_month');
                $var_ld_year = Input::post('ld_year');
                $var_ld = $var_ld_year . '-' . $var_ld_month . '-' . $var_ld_day;

                $employee->branch = $val->validated('branch');
                $employee->title = $val->validated('title');
                $employee->first_name = $val->validated('first_name');
                $employee->last_name = $val->validated('last_name');
                $employee->phone = $val->validated('phone');
                $employee->address = $val->validated('address');
                $employee->city = $val->validated('city');
                $employee->state = $val->validated('state');
                $employee->pincode = $val->validated('pincode');
                $employee->email = $val->validated('email');
                $employee->joining_date = $var_jd;
                $employee->leaving_date = $var_ld;
                $employee->date_of_birth = $var_dob;
                $employee->sex = $val->validated('sex');
                $employee->marital_status = $val->validated('marital_status');
                $employee->activity_status = "active";

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('employee', $employee, false);
        }

        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/edit');
    }

    public function action_archive($id = null) {
        is_null($id) and Response::redirect('employees');

        if ($employee = Model_Employee::find($id)) {
            $employee->activity_status = "inactive";

            if ($employee->save()) {
                Session::set_flash('success', 'Archived employee #' . $id);
            } else {
                Session::set_flash('error', 'Could not archive employee #' . $id);
            }
        } else {
            Session::set_flash('error', 'Could not find employee #' . $id);
        }

        Response::redirect('employees');
    }

    public function action_restore($id = null) {
        is_null($id) and Response::redirect('employees');

        if ($employee = Model_Employee::find($id)) {
            $employee->activity_status = "active";

            if ($employee->save()) {
                Session::set_flash('success', 'Restored employee #' . $id);
            } else {
                Session::set_flash('error', 'Could not restore employee #' . $id);
            }
        } else {
            Session::set_flash('error', 'Could not find employee #' . $id);
        }

        Response::redirect('employees');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('employees');

        if ($employee = Model_Employee::find($id)) {
            $employee->delete();

            Session::set_flash('success', 'Deleted employee #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete employee #' . $id);
        }

        Response::redirect('employees');
    }

}
