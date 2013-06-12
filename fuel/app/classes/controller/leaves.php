<?php
class Controller_Leaves extends Controller_Template{

	public function action_index()
	{
		$data['leaves'] = Model_Leafe::find('all');
		$this->template->title = "Leaves";
		$this->template->content = View::forge('leaves/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('leaves');

		if ( ! $data['leafe'] = Model_Leafe::find($id))
		{
			Session::set_flash('error', 'Could not find leafe #'.$id);
			Response::redirect('leaves');
		}

		$this->template->title = "Leafe";
		$this->template->content = View::forge('leaves/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Leafe::validate('create');
			
			if ($val->run())
			{
				$leafe = Model_Leafe::forge(array(
					'employee_id' => Input::post('employee_id'),
					'date_of_leave' => Input::post('date_of_leave'),
					'reason' => Input::post('reason'),
					'type' => Input::post('type'),
				));

				if ($leafe and $leafe->save())
				{
					Session::set_flash('success', 'Added leafe #'.$leafe->id.'.');

					Response::redirect('leaves');
				}

				else
				{
					Session::set_flash('error', 'Could not save leafe.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Leaves";
		$this->template->content = View::forge('leaves/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('leaves');

		if ( ! $leafe = Model_Leafe::find($id))
		{
			Session::set_flash('error', 'Could not find leafe #'.$id);
			Response::redirect('leaves');
		}

		$val = Model_Leafe::validate('edit');

		if ($val->run())
		{
			$leafe->employee_id = Input::post('employee_id');
			$leafe->date_of_leave = Input::post('date_of_leave');
			$leafe->reason = Input::post('reason');
			$leafe->type = Input::post('type');

			if ($leafe->save())
			{
				Session::set_flash('success', 'Updated leafe #' . $id);

				Response::redirect('leaves');
			}

			else
			{
				Session::set_flash('error', 'Could not update leafe #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$leafe->employee_id = $val->validated('employee_id');
				$leafe->date_of_leave = $val->validated('date_of_leave');
				$leafe->reason = $val->validated('reason');
				$leafe->type = $val->validated('type');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('leafe', $leafe, false);
		}

		$this->template->title = "Leaves";
		$this->template->content = View::forge('leaves/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('leaves');

		if ($leafe = Model_Leafe::find($id))
		{
			$leafe->delete();

			Session::set_flash('success', 'Deleted leafe #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete leafe #'.$id);
		}

		Response::redirect('leaves');

	}


}
