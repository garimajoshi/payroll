<?php
class Controller_Salaries extends Controller_Template{

	public function action_index()
	{
		$data['salaries'] = Model_Salary::find('all');
		$this->template->title = "Salaries";
		$this->template->content = View::forge('salaries/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('salaries');

		if ( ! $data['salary'] = Model_Salary::find($id))
		{
			Session::set_flash('error', 'Could not find salary #'.$id);
			Response::redirect('salaries');
		}

		$this->template->title = "Salary";
		$this->template->content = View::forge('salaries/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Salary::validate('create');
			
			if ($val->run())
			{       
                            $var['constant'] = Model_Constant::find('all', array('where' => array('name' => "basic")));
                            $var['constant'] = Model_Constant::find('all', array('where' => array('name' => "hra")));
                            $var['constant'] = Model_Constant::find('all', array('where' => array('name' => "pf")));
                            $var['constant'] = Input::post('gross');
							$var_sdxo = Input::post('sdxo');
							$var_lta = Model_Constant::find('all', array('where' => array('name' => "lta")));
							$var_medical = Model_Constant::find('all', array('where' => array('name' => "medical")));
							$var_travel = Model_Constant::find('all', array('where' => array('name' => "travel")));
							
                            $salary = Model_Salary::forge(array(
					'employee_id' => Input::post('employee_id'),
					'month' => Input::post('month'),
					'year' => Input::post('year'),
					'pf_applicable' => Input::post('pf_applicable'),
					'pf_date' => Input::post('pf_date'),
					'pf_scheme' => Input::post('pf_scheme'),
					'pf_number' => Input::post('pf_number'),
					'gross' => $var_gross,
					'sdxo' => $var_sdxo,
					'pf_adjust' => (Input::post('pf_applicable') == "yes") ? (($var_gross - $var_sdxo) / $var_pf): 0.0,
					'basic' => Input::post('basic'),
					'hra' => Input::post('hra'),
					'lta' => $var_lta,
					'medical' => $var_medical,
					'travel' => $var_travel,
					'pf_value' => Input::post('pf_value'),
					'credit_other' => Input::post('credit_other'),
					'bonus1' => Input::post('bonus1'),
					'bonus2' => Input::post('bonus2'),
					'bonus3' => Input::post('bonus3'),
					'leave' => Input::post('leave'),
					'misc1' => Input::post('misc1'),
					'misc2' => Input::post('misc2'),
					'misc3' => Input::post('misc3'),
					'income_tax' => Input::post('income_tax'),
					'net' => Input::post('net'),
				));

				if ($salary and $salary->save())
				{
					Session::set_flash('success', 'Added salary #'.$salary->id.'.');

					Response::redirect('salaries');
				}

				else
				{
					Session::set_flash('error', 'Could not save salary.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Salaries";
		$this->template->content = View::forge('salaries/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('salaries');

		if ( ! $salary = Model_Salary::find($id))
		{
			Session::set_flash('error', 'Could not find salary #'.$id);
			Response::redirect('salaries');
		}

		$val = Model_Salary::validate('edit');

		if ($val->run())
		{
			$salary->employee_id = Input::post('employee_id');
			$salary->month = Input::post('month');
			$salary->year = Input::post('year');
			$salary->pf_applicable = Input::post('pf_applicable');
			$salary->pf_date = Input::post('pf_date');
			$salary->pf_scheme = Input::post('pf_scheme');
			$salary->pf_number = Input::post('pf_number');
			$salary->gross = Input::post('gross');
			$salary->sdxo = Input::post('sdxo');
			$salary->pf_adjust = Input::post('pf_adjust');
			$salary->basic = Input::post('basic');
			$salary->hra = Input::post('hra');
			$salary->lta = Input::post('lta');
			$salary->medical = Input::post('medical');
			$salary->travel = Input::post('travel');
			$salary->pf_value = Input::post('pf_value');
			$salary->credit_other = Input::post('credit_other');
			$salary->bonus1 = Input::post('bonus1');
			$salary->bonus2 = Input::post('bonus2');
			$salary->bonus3 = Input::post('bonus3');
			$salary->leave = Input::post('leave');
			$salary->misc1 = Input::post('misc1');
			$salary->misc2 = Input::post('misc2');
			$salary->misc3 = Input::post('misc3');
			$salary->income_tax = Input::post('income_tax');
			$salary->net = Input::post('net');

			if ($salary->save())
			{
				Session::set_flash('success', 'Updated salary #' . $id);

				Response::redirect('salaries');
			}

			else
			{
				Session::set_flash('error', 'Could not update salary #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$salary->employee_id = $val->validated('employee_id');
				$salary->month = $val->validated('month');
				$salary->year = $val->validated('year');
				$salary->pf_applicable = $val->validated('pf_applicable');
				$salary->pf_date = $val->validated('pf_date');
				$salary->pf_scheme = $val->validated('pf_scheme');
				$salary->pf_number = $val->validated('pf_number');
				$salary->gross = $val->validated('gross');
				$salary->sdxo = $val->validated('sdxo');
				$salary->pf_adjust = $val->validated('pf_adjust');
				$salary->basic = $val->validated('basic');
				$salary->hra = $val->validated('hra');
				$salary->lta = $val->validated('lta');
				$salary->medical = $val->validated('medical');
				$salary->travel = $val->validated('travel');
				$salary->pf_value = $val->validated('pf_value');
				$salary->credit_other = $val->validated('credit_other');
				$salary->bonus1 = $val->validated('bonus1');
				$salary->bonus2 = $val->validated('bonus2');
				$salary->bonus3 = $val->validated('bonus3');
				$salary->leave = $val->validated('leave');
				$salary->misc1 = $val->validated('misc1');
				$salary->misc2 = $val->validated('misc2');
				$salary->misc3 = $val->validated('misc3');
				$salary->income_tax = $val->validated('income_tax');
				$salary->net = $val->validated('net');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('salary', $salary, false);
		}

		$this->template->title = "Salaries";
		$this->template->content = View::forge('salaries/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('salaries');

		if ($salary = Model_Salary::find($id))
		{
			$salary->delete();

			Session::set_flash('success', 'Deleted salary #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete salary #'.$id);
		}

		Response::redirect('salaries');

	}


}
