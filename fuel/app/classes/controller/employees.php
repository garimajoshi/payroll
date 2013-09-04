<?php

class Controller_Employees extends Controller_Base {

    public function action_index() {
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/index', $data);
    }

    public function action_view($id = null) {
        parent::has_access("view_employee");
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

    public function action_viewarchive() {
        parent::has_access("archive_employee");
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "inactive")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/viewarchive', $data);
    }

    public function action_viewDelete() {
        parent::has_access("archive_employee");
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "delete")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('employees/viewDelete', $data);
    }

    public function action_search() {

        $query = Input::get('search');

        if (!isset($query)) {
            $query = Session::get('search');
        } else {
            Session::set('search', $query);
        }

        $data['employees'] = Model_Employee::find('all', array(
                    'where' => array(
                        array('activity_status' => 'active'),
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

    public function action_search_archive() {

        parent::has_access("archive_employee");
        $query = Input::get('search');

        if (!isset($query)) {
            $query = Session::get('search');
        } else {
            Session::set('search', $query);
        }

        $data['employees'] = Model_Employee::find('all', array(
                    'where' => array(
                        array('activity_status' => 'inactive'),
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

        parent::has_access("create_employee");
        
      
        
         
         if (Input::method() == 'POST') {
            $val = Model_Employee::validate('create');

            if ($emp = Model_Employee::find(Input::post('id'))) {
                Session::set_flash('error', 'Employee already exist #' . Input::post('id') . '.');
                Response::redirect('employees');
            }

            if ($val->run()) {

                
                $var_ld_day = Input::post('ld_day');
                $var_ld_month = Input::post('ld_month');
                $var_ld_year = Input::post('ld_year');
                $var_ld = $var_ld_year . '-' . $var_ld_month . '-' . $var_ld_day;
               
                if ($var_ld_month == 0)
                    $var_ld = null;

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
							'jd_date' => Input::post('jd_day'),
							'jd_month' => Input::post('jd_month'),
							'jd_year' => Input::post('jd_year'),
            				
            				'dob_date' => Input::post('dob_day'),
							'dob_month' => Input::post('dob_month'),
            				'dob_year' => Input::post('dob_year'),
                                      
                            'leaving_date' => $var_ld,
                          
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

        parent::has_access("create_employee");
        is_null($id) and Response::redirect('employees');

        if (!$employee = Model_Employee::find($id)) {
            Session::set_flash('error', 'Could not find employee #' . $id);
            Response::redirect('employees');
        }

        $val = Model_Employee::validate('edit');

        if ($val->run()) {
            $var_ld_day = Input::post('ld_day');
            $var_ld_month = Input::post('ld_month');
            $var_ld_year = Input::post('ld_year');
            $var_ld = $var_ld_year . '-' . $var_ld_month . '-' . $var_ld_day;
			if ($var_ld_month == 0)
                    $var_ld = null;
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
            $employee->jd_date = Input::post('jd_day');
			$employee->jd_month = Input::post('jd_month');
			$employee->jd_year = Input::post('jd_year');
            $employee->leaving_date = $var_ld;
            $employee->dob_date = Input::post('dob_day');
			$employee->dob_month = Input::post('dob_month');
            $employee->dob_year = Input::post('dob_year');
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
        parent::has_access("archive_employee");
        is_null($id) and Response::redirect('employees');

        if ($employee = Model_Employee::find($id)) {
            $employee->activity_status = "inactive";
                Session::set_flash('success', 'Archived employee #' . $id);
            if ($employee->save()) {
                Session::set_flash('success', 'Archived employee #' . $id);
            } 
        } else {
            Session::set_flash('error', 'Could not find employee #' . $id);
        }

        if ($salaries = Model_Salary::find('all', array('where' => array('employee_id' => $id)))) {
            foreach ($salaries as $salary):
                $salary->lock = "archive";
                $salary->save();
            endforeach;
        } else {
           
        }

        Response::redirect('employees');
    }

    public function action_restore($id = null) {
        parent::has_access("archive_employee");
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

        if ($salaries = Model_Salary::find('all', array('where' => array('employee_id' => $id)))) {
            foreach ($salaries as $salary):
                $salary->lock = "true";
                $salary->save();
            endforeach;
        } else {
            
        }

        Response::redirect('employees');
    }

    public function action_delete($id = null) {
        parent::has_access("archive_employee");
        is_null($id) and Response::redirect('employees');

        if ($employee = Model_Employee::find($id)) {
            $employee->activity_status = "delete";

            if ($employee->save()) {
                Session::set_flash('success', 'Deleted employee #' . $id);
            } else {
                Session::set_flash('error', 'Could not delete employee #' . $id);
            }
        } else {
            Session::set_flash('error', 'Could not find employee #' . $id);
        }

        if ($salaries = Model_Salary::find('all', array('where' => array('employee_id' => $id)))) {
            foreach ($salaries as $salary):
                $salary->lock = "delete";
                $salary->save();
            endforeach;
        } else {
           // Session::set_flash('error', 'Could not delete employee #' . $id);
        }
        Response::redirect('employees/viewarchive');
    }

}

