<?php

class Controller_Salaries extends Controller_Base {

    public function action_index() {

        $data['employees'] = Model_Employee::find('all', array('where' => array('activity_status' => "active")));
        $this->template->title = "Employees";
        $this->template->content = View::forge('salaries/index', $data);
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('salaries');
        if (!$data['salary'] = Model_Salary::find($id)) {
            Session::set_flash('error', 'Could not find salary #' . $id);
            Response::redirect('salaries');
        }

        $this->template->title = "Salary";
        $this->template->content = View::forge('salaries/view', $data);
    }

    public function action_archive($id = null) {
        is_null($id) and Response::redirect('salaries');

        if ($employee = Model_Employee::find($id)) {
            $employee->lock = "true";

            if ($employee->save()) {
                Session::set_flash('success', 'Archived salary statement');
            } else {
                Session::set_flash('error', 'Could not archive');
            }
        } else {
            Session::set_flash('error', 'Could not find salary statement #' . $id);
        }

        Response::redirect('salaries');
    }

    public function action_create($id = null) {
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

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('salaries');

        if (!$salary = Model_Salary::find($id)) {
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

            $salary->month = Input::post('month');
            $salary->year = Input::post('year');
            $salary->lock = 'false';
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


                $salary->month = $val->validated('month');
                $salary->year = $val->validated('year');
                $salary->lock = 'false';
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
        $this->template->content = View::forge('salaries/edit');
    }

    public function action_statement() {
        $var_month = Input::post('month');
        $var_year = Input::post('year');

        $data['salaries'] = Model_Salary::find('all', array('where' => array(array('month' => $var_month), array('year' => $var_year)),
                    'related' => array('employee')));
        $data['month'] = $var_month;
        $data['year'] = $var_year;
        $this->template->title = 'Salary Statement';
        $this->template->content = View::forge('salaries/statement', $data);
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('salaries');

        if ($salary = Model_Salary::find($id)) {
            $salary->delete();

            Session::set_flash('success', 'Deleted salary #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete salary #' . $id);
        }

        Response::redirect('salaries');
    }

    public function action_print($id = null, $month = null, $year = null) {

        (is_null($id) or is_null($month) or is_null($year)) and Response::redirect('salaries');
        $data['company'] = Model_Company::find('first', array('where' => array('city' => "Bangalore")));

        if (!$data['salary'] = Model_Salary::find('first', array('where' => array(array('month' => $month), array('year' => $year))))) {
            Session::set_flash('error', 'Could not find salary #' . $id);
            Response::redirect('salaries');
        }
        return Response::forge(View::forge('salaries/payslip', $data));
    }

}

