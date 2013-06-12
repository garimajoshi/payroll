<?php
class Controller_Employees extends Controller_Template{

	public function action_index()
	{
		$data['employees'] = Model_Employee::find('all');
		$this->template->title = "Employees";
		$this->template->content = View::forge('employees/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('employees');

		if ( ! $data['employee'] = Model_Employee::find($id))
		{
			Session::set_flash('error', 'Could not find employee #'.$id);
			Response::redirect('employees');
		}

		$this->template->title = "Employee";
		$this->template->content = View::forge('employees/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Employee::validate('create');
			
			if ($val->run())
			{
				$employee = Model_Employee::forge(array(
					'name' => Input::post('name'),
					'phone' => Input::post('phone'),
					'address' => Input::post('address'),
					'city' => Input::post('city'),
					'state' => Input::post('state'),
					'pincode' => Input::post('pincode'),
					'email' => Input::post('email'),
					'joining_date' => Input::post('joining_date'),
					'leaving_date' => Input::post('leaving_date'),
					'date_of_birth' => Input::post('date_of_birth'),
					'sex' => Input::post('sex'),
					'marital_status' => Input::post('marital_status'),
					'activity_status' => Input::post('activity_status'),
				));

				if ($employee and $employee->save())
				{
					Session::set_flash('success', 'Added employee #'.$employee->id.'.');

					Response::redirect('employees');
				}

				else
				{
					Session::set_flash('error', 'Could not save employee.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Employees";
		$this->template->content = View::forge('employees/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('employees');

		if ( ! $employee = Model_Employee::find($id))
		{
			Session::set_flash('error', 'Could not find employee #'.$id);
			Response::redirect('employees');
		}

		$val = Model_Employee::validate('edit');

		if ($val->run())
		{
			$employee->name = Input::post('name');
			$employee->phone = Input::post('phone');
			$employee->address = Input::post('address');
			$employee->city = Input::post('city');
			$employee->state = Input::post('state');
			$employee->pincode = Input::post('pincode');
			$employee->email = Input::post('email');
			$employee->joining_date = Input::post('joining_date');
			$employee->leaving_date = Input::post('leaving_date');
			$employee->date_of_birth = Input::post('date_of_birth');
			$employee->sex = Input::post('sex');
			$employee->marital_status = Input::post('marital_status');
			$employee->activity_status = Input::post('activity_status');

			if ($employee->save())
			{
				Session::set_flash('success', 'Updated employee #' . $id);

				Response::redirect('employees');
			}

			else
			{
				Session::set_flash('error', 'Could not update employee #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$employee->name = $val->validated('name');
				$employee->phone = $val->validated('phone');
				$employee->address = $val->validated('address');
				$employee->city = $val->validated('city');
				$employee->state = $val->validated('state');
				$employee->pincode = $val->validated('pincode');
				$employee->email = $val->validated('email');
				$employee->joining_date = $val->validated('joining_date');
				$employee->leaving_date = $val->validated('leaving_date');
				$employee->date_of_birth = $val->validated('date_of_birth');
				$employee->sex = $val->validated('sex');
				$employee->marital_status = $val->validated('marital_status');
				$employee->activity_status = $val->validated('activity_status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('employee', $employee, false);
		}

		$this->template->title = "Employees";
		$this->template->content = View::forge('employees/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('employees');

		if ($employee = Model_Employee::find($id))
		{
			$employee->delete();

			Session::set_flash('success', 'Deleted employee #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete employee #'.$id);
		}

		Response::redirect('employees');

	}


}
