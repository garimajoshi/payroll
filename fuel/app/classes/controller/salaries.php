<?php

class Controller_Salaries extends Controller_Base {

    public function action_index() {
		
        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('salaries/index', $data);
    }

    public function action_rename() {

		parent::has_access("add_salary");
        $data['renames'] = Model_Rename::find('all');
        $this->template->title = "Rename Fields";
        $this->template->content = View::forge('salaries/rename', $data);
    }

    public function action_renameSubmit() {

		parent::has_access("add_salary");
        if (Input::method() == 'POST') {

            if (!$rename = Model_Rename::find('first', array('where' => array('id' => 1)))) {
                Session::set_flash('error', 'Could not rename.');
                Response::redirect('salaries/rename');
            }
            $rename->bonus1 = Input::post('bonus1');
            $rename->bonus2 = Input::post('bonus2');
            $rename->allowance1 = Input::post('allowance1');
            $rename->allowance2 = Input::post('allowance2');
            $rename->allowance3 = Input::post('allowance3');
            $rename->deduction1 = Input::post('deduction1');
            $rename->deduction2 = Input::post('deduction2');
            $rename->deduction3 = Input::post('deduction3');
            if ($rename->save()) {
                Session::set_flash('success', 'Successfully renamed.');
                Response::redirect('salaries');
            } else {
                Session::set_flash('error', 'Could not rename.');
            }
            Response::redirect('salaries/rename');
        }
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

        $this->template->title = "Salaries";
        $this->template->content = View::forge('salaries/search', $data);
    }

    public function action_structure() {

        parent::has_access("salary_structure");

        if (Input::method() == 'POST') {
            $pf_adjust = Model_Constant::find('first', array('where' => array('name' => 'pf_adjust')));
            $pf_adjust->value = Input::post('pf_adjust_value');
            $pf_adjust->save();

            $pf = Model_Constant::find('first', array('where' => array('name' => 'pf')));
            $pf->value = Input::post('value_pf');
            $pf->save();

            $basic = Model_Constant::find('first', array('where' => array('name' => 'basic')));
            $basic->value = Input::post('value_basic');
            $basic->save();

            $lta = Model_Constant::find('first', array('where' => array('name' => 'lta')));
            $lta->value = Input::post('value_lta');
            $lta->save();

            $medical = Model_Constant::find('first', array('where' => array('name' => 'medical')));
            $medical->value = Input::post('value_medical');
            $medical->save();

            $travel = Model_Constant::find('first', array('where' => array('name' => 'travel')));
            $travel->value = Input::post('value_travel');
            $travel->save();

            $hra = Model_Constant::find('first', array('where' => array('name' => 'hra')));
            $hra->value = Input::post('value_hra');
            $hra->save();
        }
        $this->template->title = "Salary Structure";
        $this->template->content = View::forge('salaries/structure');
    }

    public function action_lock($month = null, $year = null) {

        parent::has_access("salary_structure");
        (is_null($month) or is_null($year)) and Response::redirect('salaries');
        $locks = Model_Salary::find('all', array('where' => array(array('month' => $month), array('year' => $year))));
        $data['month'] = $month;
        $data['year'] = $year;
        foreach ($locks as $lock):
            $lock->lock = "true";
            $lock->save();
        endforeach;
        Response::redirect('salaries');
    }

    public function action_payroll($month = null, $year = null) {
        parent::has_access("add_salary");
        $var_month = $month;
        $var_year = $year;

        $data['salaries'] = Model_Salary::find('all', array('where' => array(array('month' => $var_month), array('year' => $var_year)),
                    'related' => array('employee')));
        $data['month'] = $var_month;
        $data['year'] = $var_year;

        $data['basic'] = Model_Constant::find('first', array('name' => 'basic'));
        $data['hra'] = Model_Constant::find('first', array('name' => 'hra'));
        $data['pf_adjust'] = Model_Constant::find('first', array('name' => 'pf_adjust'));
        $data['lta'] = Model_Constant::find('first', array('name' => 'lta'));
        $data['medical'] = Model_Constant::find('first', array('name' => 'medical'));
        $data['travel'] = Model_Constant::find('first', array('name' => 'travel'));
        $data['pf'] = Model_Constant::find('first', array('name' => 'pf'));

        $this->template->title = 'Salary Statement';
        $this->template->content = View::forge('salaries/payroll', $data);
    }

    public function action_view($id) {
	
		parent::has_access("add_salary");
		
        $data['rename'] = Model_Rename::find('first');
        $data['company'] = Model_Company::find('first', array('where' => array('city' => "Bangalore")));
        $data['employee'] = Model_Employee::find('first', array('where' => array('id' => $id)));
        $var_month = Input::post('month');
        $var_year = Input::post('year');

        $data['salary'] = Model_Salary::find('first', array('where' => array(array('employee_id' => $id), array('month' => $var_month), array('year' => $var_year)),
                    'related' => array('employee')));

        $data['month'] = $var_month;
        $data['year'] = $var_year;
        $data['fytd'] = $this->findFYTD($id, $var_month, $var_year);


        $this->template->title = 'Salary Statement';
        $this->template->content = View::forge('salaries/view', $data);
    }

    public function action_create($id = null) {
        parent::has_access("add_salary");
        is_null($id) and Response::redirect('salaries');

        $data['employees'] = Model_Employee::find('all', array('where' => array('id' => $id)));

        $c_basic = Model_Constant::find('first', array('where' => array('name' => 'basic')));
        $var_basic_frac = $c_basic->value;

        $c_hra = Model_Constant::find('first', array('where' => array('name' => 'hra')));
        $var_hra_frac = $c_hra->value;

        $c_pf_adjust = Model_Constant::find('first', array('where' => array('name' => 'pf_adjust')));
        $var_pf_adjust_frac = $c_pf_adjust->value;

        $c_lta = Model_Constant::find('first', array('where' => array('name' => 'lta')));
        $var_lta_frac = $c_lta->value;

        $c_pf = Model_Constant::find('first', array('where' => array('name' => 'pf')));
        $pf = $c_pf->value;

        $c_medical = Model_Constant::find('first', array('where' => array('name' => 'medical')));
        $var_medical = $c_medical->value;

        $c_travel = Model_Constant::find('first', array('where' => array('name' => 'travel')));
        $var_travel = $c_travel->value;

        $data['basic'] = $var_basic_frac;
        $data['hra'] = $var_hra_frac;
        $data['pf_adjust'] = $var_pf_adjust_frac;
        $data['lta'] = $var_lta_frac;
        $data['pf'] = $pf;
        $data['medical'] = $var_medical;
        $data['travel'] = $var_travel;

        if (Input::method() == 'POST') {
            $val = Model_Salary::validate('create');
            if ($val->run()) {
                $var_pf_applicable = Input::post('pf_applicable');
                $var_month = Input::post('month');
                $var_year = Input::post('year');
                $var_gross = Input::post('gross');
                $var_sdxo = Input::post('sdxo');
                $var_bonus1 = Input::post('bonus1');
                $var_bonus2 = Input::post('bonus2');
                $var_allowance1 = Input::post('allowance1');
                $var_leave = Input::post('leave');
                $var_allowance2 = Input::post('allowance2');
                $var_allowance3 = Input::post('allowance3');
                $var_income_tax = Input::post('income_tax');
                $var_professional_tax = Input::post('professional_tax');
                $var_deduction1 = Input::post('deduction1');
                $var_deduction2 = Input::post('deduction2');
                $var_deduction3 = Input::post('deduction3');

                $var_adj_sdxo = $var_gross - $var_sdxo;
                $var_pf_adjust = (Input::post('pf_applicable') == "1") ? ($var_adj_sdxo / $var_pf_adjust_frac) : $var_adj_sdxo;
                $var_basic = $var_basic_frac * $var_pf_adjust;
                $var_hra = $var_hra_frac * $var_pf_adjust;
                $var_lta = $var_lta_frac * $var_pf_adjust;
                $var_pf_value = (Input::post('pf_applicable') == "1") ? ($pf * $var_basic) : 0;

                $var_credit_other = $var_pf_adjust - ($var_basic + $var_hra + $var_lta + $var_medical + $var_travel + $var_pf_value);
                $var_credit_total = $var_basic + $var_hra + $var_lta + $var_medical + $var_travel + $var_pf_value + $var_credit_other + $var_leave + $var_bonus1 + $var_bonus2 + $var_allowance1 + $var_allowance2 + $var_allowance3;
                $var_total_debit = $var_professional_tax + $var_income_tax + $var_pf_value + $var_deduction1 + $var_deduction2 + $var_deduction3;
                $var_net = $var_credit_total - $var_total_debit;




                $salary = Model_Salary::forge(array(
                            'employee_id' => $id,
                            'month' => $var_month,
                            'year' => $var_year,
                            'lock' => 'false',
                            'pf_applicable' => $var_pf_applicable,
                            'gross' => $var_gross,
                            'sdxo' => $var_sdxo,
                            'pf_adjust' => $var_pf_adjust,
                            'basic' => $var_basic,
                            'hra' => $var_hra,
                            'lta' => $var_lta,
                            'medical' => $var_medical,
                            'travel' => $var_travel,
                            'pf_value' => $var_pf_value,
                            'credit_other' => $var_credit_other,
                            'bonus1' => $var_bonus1,
                            'bonus2' => $var_bonus2,
                            'allowance1' => $var_allowance1,
                            'leave' => $var_leave,
                            'allowance2' => $var_allowance2,
                            'allowance3' => $var_allowance3,
                            'credit_total' => $var_credit_total,
                            'income_tax' => $var_income_tax,
                            'professional_tax' => $var_professional_tax,
                            'deduction1' => $var_deduction1,
                            'deduction2' => $var_deduction2,
                            'deduction3' => $var_deduction3,
                            'total_debit' => $var_total_debit,
                            'net' => $var_net,
                ));
                if ($salary and $salary->save()) {
                    Session::set_flash('success', 'Added salary for #' . $salary->employee_id . '.');

                    Response::redirect('salaries');
                } else {
                    Session::set_flash('error', 'Could not save employee.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "salaries";
        $this->template->content = View::forge('salaries/create', $data);
    }

    public function action_edit($id = null, $month = null, $year = null) {
        parent::has_access("add_salary");
        (is_null($id) or is_null($month) or is_null($year)) and Response::redirect('salaries');

        $data['employees'] = Model_Employee::find('all', array('where' => array('id' => $id)));

        $c_basic = Model_Constant::find('first', array('where' => array('name' => 'basic')));
        $var_basic_frac = $c_basic->value;

        $c_hra = Model_Constant::find('first', array('where' => array('name' => 'hra')));
        $var_hra_frac = $c_hra->value;

        $c_pf_adjust = Model_Constant::find('first', array('where' => array('name' => 'pf_adjust')));
        $var_pf_adjust_frac = $c_pf_adjust->value;

        $c_lta = Model_Constant::find('first', array('where' => array('name' => 'lta')));
        $var_lta_frac = $c_lta->value;

        $c_pf = Model_Constant::find('first', array('where' => array('name' => 'pf')));
        $pf = $c_pf->value;

        $c_medical = Model_Constant::find('first', array('where' => array('name' => 'medical')));
        $var_medical = $c_medical->value;

        $c_travel = Model_Constant::find('first', array('where' => array('name' => 'travel')));
        $var_travel = $c_travel->value;

        $data['basic'] = $var_basic_frac;
        $data['hra'] = $var_hra_frac;
        $data['pf_adjust'] = $var_pf_adjust_frac;
        $data['lta'] = $var_lta_frac;
        $data['pf'] = $pf;
        $data['medical'] = $var_medical;
        $data['travel'] = $var_travel;

        if (!$salary = Model_Salary::find('first', array('where' => array(array('employee_id' => $id), array('month' => $month), array('year' => $year))))) {
            Session::set_flash('error', 'Could not find salary #' . $id);
            Response::redirect('salaries');
        }

        $val = Model_Salary::validate('edit');

        if ($val->run()) {

            $var_gross = Input::post('gross');
            $var_sdxo = Input::post('sdxo');

            $var_bonus1 = Input::post('bonus1');
            $var_bonus2 = Input::post('bonus2');
            $var_allowance1 = Input::post('allowance1');
            $var_allowance2 = Input::post('allowance2');
            $var_allowance3 = Input::post('allowance3');
            $var_income_tax = Input::post('income_tax');
            $var_professional_tax = Input::post('professional_tax');
            $var_deduction1 = Input::post('deduction1');
            $var_deduction2 = Input::post('deduction2');
            $var_deduction3 = Input::post('deduction3');
            $var_leave = Input::post('leave');

            $c_basic = Model_Constant::find('first', array('where' => array('name' => 'basic')));
            $var_basic_frac = $c_basic->value;

            $c_hra = Model_Constant::find('first', array('where' => array('name' => 'hra')));
            $var_hra_frac = $c_hra->value;

            $c_pf_adjust = Model_Constant::find('first', array('where' => array('name' => 'pf_adjust')));
            $var_pf_adjust_frac = $c_pf_adjust->value;

            $c_lta = Model_Constant::find('first', array('where' => array('name' => 'lta')));
            $var_lta = $c_lta->value;

            $c_pf = Model_Constant::find('first', array('where' => array('name' => 'pf')));
            $pf = $c_pf->value;

            $c_medical = Model_Constant::find('first', array('where' => array('name' => 'medical')));
            $var_medical = $c_medical->value;

            $c_travel = Model_Constant::find('first', array('where' => array('name' => 'travel')));
            $var_travel = $c_travel->value;

            $var_adj_sdxo = $var_gross - $var_sdxo;
            $var_pf_adjust = (Input::post('pf_applicable') == "1") ? ($var_adj_sdxo / $var_pf_adjust_frac) : $var_adj_sdxo;
            $var_basic = $var_basic_frac * $var_pf_adjust;
            $var_hra = $var_hra_frac * $var_pf_adjust;
            $var_pf_value = (Input::post('pf_applicable') == "1") ? ($pf * $var_basic) : 0;

            $var_credit_other = $var_pf_adjust - ($var_basic + $var_hra + $var_lta + $var_medical + $var_travel + $var_pf_value);
            $var_credit_total = $var_basic + $var_hra + $var_lta + $var_medical + $var_travel + $var_pf_value + $var_credit_other + $var_leave + $var_bonus1 + $var_bonus2 + $var_allowance1 + $var_allowance2 + $var_allowance3;
            $var_total_debit = $var_professional_tax + $var_income_tax + $var_pf_value + $var_deduction1 + $var_deduction2 + $var_deduction3;
            $var_net = $var_credit_total - $var_total_debit;

            $salary->pf_applicable = Input::post('pf_applicable');
            $salary->gross = $var_gross;
            $salary->sdxo = $var_sdxo;
            $salary->pf_adjust = $var_pf_adjust;
            $salary->basic = $var_basic;
            $salary->hra = $var_hra;
            $salary->lta = $var_lta;
            $salary->medical = $var_medical;
            $salary->travel = $var_travel;
            $salary->pf_value = $var_pf_value;
            $salary->credit_other = $var_credit_other;
            $salary->bonus1 = $var_bonus1;
            $salary->bonus2 = $var_bonus2;
            $salary->allowance1 = $var_allowance1;
            $salary->leave = $var_leave;
            $salary->allowance2 = $var_allowance2;
            $salary->allowance3 = $var_allowance3;
            $salary->credit_total = $var_credit_total;
            $salary->income_tax = $var_income_tax;
            $salary->professional_tax = $var_professional_tax;
            $salary->deduction1 = $var_deduction1;
            $salary->deduction2 = $var_deduction2;
            $salary->deduction3 = $var_deduction3;
            $salary->total_debit = $var_total_debit;
            $salary->net = $var_net;

            if ($salary->save()) {
                Session::set_flash('success', 'Updated salary #' . $id);

                Response::redirect('salaries');
            } else {
                Session::set_flash('error', 'Could not update salary #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {

                $var_gross = Input::post('gross');
                $var_sdxo = Input::post('sdxo');

                $var_bonus1 = Input::post('bonus1');
                $var_bonus2 = Input::post('bonus2');
                $var_allowance1 = Input::post('allowance1');
                $var_allowance2 = Input::post('allowance2');
                $var_allowance3 = Input::post('allowance3');
                $var_income_tax = Input::post('income_tax');
                $var_professional_tax = Input::post('professional_tax');
                $var_deduction1 = Input::post('deduction1');
                $var_deduction2 = Input::post('deduction2');
                $var_deduction3 = Input::post('deduction3');
                $var_leave = Input::post('leave');

                $c_basic = Model_Constant::find('first', array('where' => array('name' => 'basic')));
                $var_basic_frac = $c_basic->value;

                $c_hra = Model_Constant::find('first', array('where' => array('name' => 'hra')));
                $var_hra_frac = $c_hra->value;

                $c_pf_adjust = Model_Constant::find('first', array('where' => array('name' => 'pf_adjust')));
                $var_pf_adjust_frac = $c_pf_adjust->value;

                $c_lta = Model_Constant::find('first', array('where' => array('name' => 'lta')));
                $var_lta = $c_lta->value;

                $c_pf = Model_Constant::find('first', array('where' => array('name' => 'pf')));
                $pf = $c_pf->value;

                $c_medical = Model_Constant::find('first', array('where' => array('name' => 'medical')));
                $var_medical = $c_medical->value;

                $c_travel = Model_Constant::find('first', array('where' => array('name' => 'travel')));
                $var_travel = $c_travel->value;

                $var_adj_sdxo = $var_gross - $var_sdxo;
                $var_pf_adjust = (Input::post('pf_applicable') == "1") ? ($var_adj_sdxo / $var_pf_adjust_frac) : $var_adj_sdxo;
                $var_basic = $var_basic_frac * $var_pf_adjust;
                $var_hra = $var_hra_frac * $var_pf_adjust;
                $var_pf_value = (Input::post('pf_applicable') == "1") ? ($pf * $var_basic) : 0;

                $var_credit_other = $var_pf_adjust - ($var_basic + $var_hra + $var_lta + $var_medical + $var_travel + $var_pf_value);
                $var_credit_total = $var_basic + $var_hra + $var_lta + $var_medical + $var_travel + $var_pf_value + $var_credit_other + $var_leave + $var_bonus1 + $var_bonus2 + $var_allowance1 + $var_allowance2 + $var_allowance3;
                $var_total_debit = $var_professional_tax + $var_income_tax + $var_pf_value + $var_deduction1 + $var_deduction2 + $var_deduction3;
                $var_net = $var_credit_total - $var_total_debit;

                $salary->pf_applicable = $val->validated('pf_applicable');
                $salary->gross = $var_gross;
                $salary->sdxo = $var_sdxo;
                $salary->pf_adjust = $var_pf_adjust;
                $salary->basic = $var_basic;
                $salary->hra = $var_hra;
                $salary->lta = $var_lta;
                $salary->medical = $var_medical;
                $salary->travel = $var_travel;
                $salary->pf_value = $var_pf_value;
                $salary->credit_other = $var_credit_other;
                $salary->bonus1 = $var_bonus1;
                $salary->bonus2 = $var_bonus2;
                $salary->allowance1 = $var_allowance1;
                $salary->leave = $var_leave;
                $salary->allowance2 = $var_allowance2;
                $salary->allowance3 = $var_allowance3;
                $salary->credit_total = $var_credit_total;
                $salary->income_tax = $var_income_tax;
                $salary->professional_tax = $var_professional_tax;
                $salary->deduction1 = $var_deduction1;
                $salary->deduction2 = $var_deduction2;
                $salary->deduction3 = $var_deduction3;
                $salary->total_debit = $var_total_debit;
                $salary->net = $var_net;

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('salary', $salary, false);
        }

        $this->template->title = "Salaries";
        $this->template->content = View::forge('salaries/edit', $data);
    }

    public function action_viewDelete($id = null) {
		parent::has_access("view_archive");
        $data['salaries'] = Model_Salary::find('all', array('where' => array(array('employee_id' => $id), array('lock' => 'delete'))));
        $data['employee'] = Model_Employee::find('first', array('where' => array('id' => $id)));

        $this->template->content = View::forge('salaries/viewDelete', $data);
    }

    public function action_viewArchive($id = null) {
		parent::has_access("view_archive");
        $data['salaries'] = Model_Salary::find('all', array('where' => array(array('employee_id' => $id), array('lock' => 'archive'))));
        $data['employee'] = Model_Employee::find('first', array('where' => array('id' => $id)));

        $this->template->content = View::forge('salaries/viewArchive', $data);
    }

    public function action_statement() {
        parent::has_access("add_salary");
        $var_month = Input::post('month');
        $var_year = Input::post('year');
        $data['salarylock'] = Model_Salary::find('first', array('where' => array(array('month' => $var_month), array('year' => $var_year)),
                    'related' => array('employee')));
        $data['salaries'] = Model_Salary::find('all', array('where' => array(array('month' => $var_month), array('year' => $var_year)),
                    'related' => array('employee')));
        $data['month'] = $var_month;
        $data['year'] = $var_year;
        $this->template->title = 'Salary Statement';
        $this->template->content = View::forge('salaries/statement', $data);
    }

    private function findFYTD($id, $month, $year) {

        $total['basic'] = 0.00;
        $total['hra'] = 0.00;
        $total['lta'] = 0.00;
        $total['travel'] = 0.00;
        $total['medical'] = 0.00;
        $total['credit_other'] = 0.00;
        $total['bonus1'] = 0.00;
        $total['bonus2'] = 0.00;
        $total['leave'] = 0.00;
        $total['pf_value'] = 0.00;
        $total['credit_total'] = 0.00;
        $total['allowance1'] = 0.00;
        $total['allowance2'] = 0.00;
        $total['allowance3'] = 0.00;
        $total['professional_tax'] = 0.00;
        $total['income_tax'] = 0.00;
        $total['deduction1'] = 0.00;
        $total['deduction2'] = 0.00;
        $total['deduction3'] = 0.00;
        $total['total_debit'] = 0.00;
        $total['net'] = 0.00;

        if ($month >= 4) {

            $salaries = Model_Salary::find('all', array('where' => array(array('employee_id' => $id), array('month', '>', 3), array('month', '<=', $month), array('year' => $year)
            )));
            foreach ($salaries as $salary) {
                $total['basic'] += $salary->basic;
                $total['hra'] += $salary->hra;
                $total['lta'] += $salary->lta;
                $total['medical'] += $salary->medical;
                $total['travel'] += $salary->travel;
                $total['credit_other'] += $salary->credit_other;
                $total['bonus1'] += $salary->bonus1;
                $total['bonus2'] += $salary->bonus2;
                $total['leave'] += $salary->leave;
                $total['pf_value'] +=$salary->pf_value;
                $total['credit_total'] += $salary->credit_total;
                $total['allowance1'] += $salary->allowance1;
                $total['allowance2'] += $salary->allowance2;
                $total['allowance3'] += $salary->allowance3;
                $total['professional_tax'] += $salary->professional_tax;
                $total['income_tax'] += $salary->income_tax;
                $total['deduction1'] += $salary->deduction1;
                $total['deduction2'] += $salary->deduction2;
                $total['deduction3'] += $salary->deduction3;
                $total['total_debit'] += $salary->total_debit;
                $total['net'] += $salary->net;
            }
        } else if ($month < 4) {
            $salaries = Model_Salary::find('all', array('where' => array(array('employee_id' => $id), array('month', '<=', $month), array('year' => $year))));

            foreach ($salaries as $salary) {
                $total['basic'] += $salary->basic;
                $total['hra'] += $salary->hra;
                $total['lta'] += $salary->lta;
                $total['medical'] += $salary->medical;
                $total['travel'] += $salary->travel;
                $total['credit_other'] += $salary->credit_other;
                $total['bonus1'] += $salary->bonus1;
                $total['bonus2'] += $salary->bonus2;
                $total['leave'] += $salary->leave;
                $total['pf_value'] +=$salary->pf_value;
                $total['credit_total'] += $salary->credit_total;
                $total['allowance1'] += $salary->allowance1;
                $total['allowance2'] += $salary->allowance2;
                $total['allowance3'] += $salary->allowance3;
                $total['professional_tax'] += $salary->professional_tax;
                $total['income_tax'] += $salary->income_tax;
                $total['deduction1'] += $salary->deduction1;
                $total['deduction2'] += $salary->deduction2;
                $total['deduction3'] += $salary->deduction3;
                $total['total_debit'] += $salary->total_debit;
                $total['net'] += $salary->net;
            }

            $last_year = Model_Salary::find('all', array('where' => array(array('employee_id' => $id), array('month', '>', 3), array('year' => ($year - 1)))));

            foreach ($last_year as $salary) {
                $total['basic'] += $salary->basic;
                $total['hra'] += $salary->hra;
                $total['lta'] += $salary->lta;
                $total['medical'] += $salary->medical;
                $total['travel'] += $salary->travel;
                $total['credit_other'] += $salary->credit_other;
                $total['bonus1'] += $salary->bonus1;
                $total['bonus2'] += $salary->bonus2;
                $total['leave'] += $salary->leave;
                $total['pf_value'] +=$salary->pf_value;
                $total['credit_total'] += $salary->credit_total;
                $total['allowance1'] += $salary->allowance1;
                $total['allowance2'] += $salary->allowance2;
                $total['allowance3'] += $salary->allowance3;
                $total['professional_tax'] += $salary->professional_tax;
                $total['income_tax'] += $salary->income_tax;
                $total['deduction1'] += $salary->deduction1;
                $total['deduction2'] += $salary->deduction2;
                $total['deduction3'] += $salary->deduction3;
                $total['total_debit'] += $salary->total_debit;
                $total['net'] += $salary->net;
            }
        }
        return $total;
    }

    public function action_print($id = null, $month = null, $year = null) {
        parent::has_access("print_salary_statement");

        (is_null($id) or is_null($month) or is_null($year)) and Response::redirect('salaries');
        $data['rename'] = Model_Rename::find('first');

        $data['company'] = Model_Company::find('first', array('where' => array('city' => "Bangalore")));
        $data['employee'] = Model_Employee::find('first', array('where' => array('id' => $id)));

        if (!$data['salary'] = Model_Salary::find('first', array('where' => array(array('employee_id' => $id), array('month' => $month), array('year' => $year))))) {
            Session::set_flash('error', 'Could not find salary #' . $id);
            Response::redirect('salaries');
        }

        $data['fytd'] = $this->findFYTD($id, $month, $year);
        return Response::forge(View::forge('salaries/payslip', $data));
    }

    public function action_process($month = null, $year = null) {

        parent::has_access("add_salary");
        (is_null($month) or is_null($year)) and Response::redirect('salaries');

        if ($month == 1) {
            $m = 12;
            $y = $year - 1;
        } else {
            $m = $month - 1;
            $y = $year;
        }
        $salaries = Model_Salary::find('all', array('where' => array(array('month' => $m), array('year' => $y))));
        $data['month'] = $month;
        $data['year'] = $year;

        foreach ($salaries as $salary):
            $emp = new Model_Salary();
            $emp->employee_id = $salary->employee_id;
            $emp->month = $month;
            $emp->year = $year;
            $emp->lock = 'false';
            $emp->pf_applicable = $salary->pf_applicable;
            $emp->gross = $salary->gross;
            $emp->sdxo = $salary->sdxo;
            $emp->pf_adjust = $salary->pf_adjust;
            $emp->basic = $salary->basic;
            $emp->hra = $salary->hra;
            $emp->lta = $salary->lta;
            $emp->medical = $salary->medical;
            $emp->travel = $salary->travel;
            $emp->pf_value = $salary->pf_value;
            $emp->credit_other = $salary->credit_other;
            $emp->bonus1 = $salary->bonus1;
            $emp->bonus2 = $salary->bonus2;
            $emp->allowance1 = $salary->allowance1;
            $emp->leave = $salary->leave;
            $emp->allowance2 = $salary->allowance2;
            $emp->allowance3 = $salary->allowance3;
            $emp->credit_total = $salary->credit_total;
            $emp->income_tax = $salary->income_tax;
            $emp->professional_tax = $salary->professional_tax;
            $emp->deduction1 = $salary->deduction1;
            $emp->deduction2 = $salary->deduction2;
            $emp->deduction3 = $salary->deduction3;
            $emp->total_debit = $salary->total_debit;
            $emp->net = $salary->net;
            $emp->save();
        endforeach;

        Response::redirect('salaries');
    }

}
