<?php

class Controller_Leaves extends Controller_Base {

    public function action_index() {
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('leaves/index', $data);
    }

    public function action_view($employee_id = null) {
        is_null($employee_id) and Response::redirect('leaves');
        $data['employee'] = Model_Employee::find('first', array('where'=>array('id' => $employee_id)));
        $data['sickhalfleaves'] = Model_Leave::find('all', array('where' => array(array('employee_id' => $employee_id), array('type' => 'sick'), array('time' => '4'))));
       
        $data['sickfullleaves'] = Model_Leave::find('all', array('where' => array(array('employee_id' => $employee_id), array('type' => 'sick'), array('time' => '8'))));
        $data['vacationhalfleaves'] = Model_Leave::find('all', array('where' => array(array('employee_id' => $employee_id), array('type' => 'vacation'), array('time' => '4'))));
        $data['vacationfullleaves'] = Model_Leave::find('all', array('where' => array(array('employee_id' => $employee_id), array('type' => 'vacation'), array('time' => '8'))));
        
        if (!$data['leaves'] = Model_Leave::find('all', array('where' => array('employee_id' => $employee_id)))) {
            Session::set_flash('error', 'Could not find leave #' . $employee_id);
            Response::redirect('leaves');
        }
        $this->template->title = "Leave";
        $this->template->content = View::forge('leaves/view', $data);
    }

    public function action_create($id = null) {
        is_null($id) and Response::redirect('leaves');
        $data['employees'] = Model_Employee::find('all', array('where' => array('id' => $id)));

        if (Input::method() == 'POST') {
            $val = Model_Leave::validate('create');

            if ($val->run()) {
                $var_dol_day = Input::post('dol_day');
                $var_dol_month = Input::post('dol_month');
                $var_dol_year = Input::post('dol_year');
                $var_dol = $var_dol_year . '-' . $var_dol_month . '-' . $var_dol_day;
                $var_input = Input::post('submit');
                echo $var_input;
                $leave = Model_Leave::forge(array(
                            'employee_id' => $id,
                            'date_of_leave' => $var_dol,
                            'time' => Input::post('time'),
                            'type' => Input::post('type'),
                ));

                if ($leave and $leave->save()) {
                    Session::set_flash('success', 'Added leave #' . $leave->id . '.');
                } else {
                    Session::set_flash('error', 'Could not save leave.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        if (Input::post('submit') == 'Save') {
            Response::redirect('leaves');
        }

        $this->template->title = "Leaves";
        $this->template->content = View::forge('leaves/create', $data);
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('leaves');

        if (!$leave = Model_Leave::find($id)) {
            Session::set_flash('error', 'Could not find leave #' . $id);
            Response::redirect('leaves');
        }

        $val = Model_Leave::validate('edit');

        if ($val->run()) {
            $leave->date_of_leave = Input::post('date_of_leave');
            $leave->reason = Input::post('reason');
            $leave->type = Input::post('type');

            if ($leave->save()) {
                Session::set_flash('success', 'Updated leave #' . $id);

                Response::redirect('leaves');
            } else {
                Session::set_flash('error', 'Could not update leave #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $leave->date_of_leave = $val->validated('date_of_leave');
                $leave->reason = $val->validated('reason');
                $leave->type = $val->validated('type');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('leave', $leave, false);
        }

        $this->template->title = "Leaves";
        $this->template->content = View::forge('leaves/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('leaves');

        if ($leave = Model_Leave::find($id)) {
            $leave->delete();

            Session::set_flash('success', 'Deleted leave #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete leave #' . $id);
        }

        Response::redirect('leaves');
    }

}
