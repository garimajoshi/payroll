<?php

class Controller_Leaves extends Controller_Base {

    public function action_index() {
        parent::has_access("view_leave");
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('leaves/index', $data);
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

        $this->template->title = "Leaves";
        $this->template->content = View::forge('leaves/search', $data);
    }

    public function action_view($employee_id = null) {
        parent::has_access("view_leave");
        is_null($employee_id) and Response::redirect('leaves');
        $data['employee'] = Model_Employee::find('first', array('where' => array('id' => $employee_id)));
        $data['sickleaves'] = Model_Leave::find('all', array('where' => array(array('employee_id' => $employee_id), array('type' => 'sick'))));

        $data['vacationleaves'] = Model_Leave::find('all', array('where' => array(array('employee_id' => $employee_id), array('type' => 'vacation'))));
            
        $data['leaves'] = Model_Leave::find('all', array('where' => array('employee_id' => $employee_id)),array('order_by' => array(
        'date_of_leave' => 'asc'),
            ));
       
        if (!$data['leaves'] ) {
            Session::set_flash('error', 'Could not find leave #' . $employee_id);
        }
        $this->template->title = "Leave";
        $this->template->content = View::forge('leaves/view', $data);
    }

   public function action_create($id = null) {
        parent::has_access("add_leave");
        is_null($id) and Response::redirect('leaves');
        $data['employees'] = Model_Employee::find('all', array('where' => array('id' => $id)));

        if (Input::method() == 'POST') {

            $dol_date = Input::post('dol_date');
            foreach ($dol_date as $var_dol_date):

                $var_dol_month = Input::post('dol_month');
                $var_dol_year = Input::post('dol_year');
                $var_dol = $var_dol_year . '-' . $var_dol_month . '-' . $var_dol_date;

                $leave = Model_Leave::forge(array(
                            'employee_id' => $id,
                            'date_of_leave' => $var_dol,
                            'time' => '8',
                            'type' => Input::post('type'),
                ));

                if ($leave and $leave->save()) {
                    Session::set_flash('success', 'Added leave for employee #' . $id . '.');
                } else {
                    Session::set_flash('error', 'Could not save leave.');
                }
            endforeach;
            Response::redirect('leaves/view/'.$id);
        }
        $this->template->title = "Leaves";
        $this->template->content = View::forge('leaves/create', $data);
    }

    public function action_edit($id = null) {
        parent::has_access("add_leave");
        is_null($id) and Response::redirect('leaves');

        if (!$leave = Model_Leave::find($id)) {
            Session::set_flash('error', 'Could not find leave #' . $id);
            Response::redirect('leaves');
        }

        $val = Model_Leave::validate('edit');

        if ($val->run()) {
            $var_dol_day = Input::post('dol_day');
            $var_dol_month = Input::post('dol_month');
            $var_dol_year = Input::post('dol_year');
            $var_dol = $var_dol_year . '-' . $var_dol_month . '-' . $var_dol_day;
            $leave->date_of_leave = $var_dol;
            $leave->time = Input::post('time');
            $leave->type = Input::post('type');

            if ($leave->save()) {
                Session::set_flash('success', 'Updated leave #' . $id);

                Response::redirect('leaves/view/' . $leave->employee_id);
            } else {
                Session::set_flash('error', 'Could not update leave #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $leave->date_of_leave = $val->validated('date_of_leave');
                $leave->time = $val->validated('time');
                $leave->type = $val->validated('type');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('leave', $leave, false);
        }

        $this->template->title = "Leaves";
        $this->template->content = View::forge('leaves/edit');
    }

    public function action_delete($id = null) {
        parent::has_access("add_leave");
        is_null($id) and Response::redirect('leaves');

        if ($leave = Model_Leave::find($id)) {
            $leave->delete();

            Session::set_flash('success', 'Deleted leave #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete leave #' . $id);
        }

        Response::redirect('leaves/view/' . $leave->employee_id);
    }

}


