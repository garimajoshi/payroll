<?php

class Controller_Leaves extends Controller_Base {

    public function action_index() {
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('leaves/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('leaves');

        if (!$data['leave'] = Model_Leave::find($id)) {
            Session::set_flash('error', 'Could not find leave #' . $id);
            Response::redirect('leaves');
        }

        $this->template->title = "Leave";
        $this->template->content = View::forge('leaves/view', $data);
    }

    public function action_create($id=null) {
            $data['employees'] = Model_Employee::find('all', array('where' => array('id' => $id)));
         
        if (Input::method() == 'POST') {
            $val = Model_Leave::validate('create');

            if ($val->run()) {
                $leave = Model_Leave::forge(array(
                            'date_of_leave' => Input::post('date_of_leave'),
                            'reason' => Input::post('reason'),
                            'type' => Input::post('type'),
                ));

                if ($leave and $leave->save()) {
                    Session::set_flash('success', 'Added leave #' . $leave->id . '.');

                    Response::redirect('leaves');
                } else {
                    Session::set_flash('error', 'Could not save leave.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Leaves";
        $this->template->content = View::forge('leaves/create',$data);
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
