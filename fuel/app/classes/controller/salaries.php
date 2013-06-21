<?php

class Controller_Salaries extends Controller_Base {

    public function action_index() {
        $data['salaries'] = Model_Salary::find('all');
        $this->template->title = "Salaries";
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

    public function action_create() {

        if (Input::method() == 'POST') {
            $val = Model_Salary::validate('create');

            if ($val->run()) {
                
                $var_gross = Input::post('gross');
                $var_sdxo = Input::post('sdxo');
                
                $var_credit_other = Input::post('credit_other');
                $var_bonus1 = Input::post('bonus1');
                $var_bonus2 = Input::post('bonus2');
                $var_allowance1 = Input::post('allowance1');
                $var_allowance2 = Input::post('allowance2');
                $var_allowance3 = Input::post('allowance3');
                $var_credit_total = Input::post('credit_total');
                $var_leave = Input::post('leave');
                $var_income_tax = Input::post('income_tax');
                $var_professional_tax = Input::post('professional_tax');
                $var_deduction1 = Input::post('deduction1');
                $var_deduction2 = Input::post('deduction2');
                $var_deduction3 = Input::post('deduction3');
                $var_total_debit = Input::post('total_debit');
                $var_net = Input::post('net');
                
                $var_basic_frac = Model_Constant::find('first', array('where' => array('name' => 'basic')));
                $var_hra_frac = Model_Constant::find('first', array('where' => array('name' => 'hra')));
                $var_pf = Model_Constant::find('first', array('where' => array('name' => 'pf_adjust')));
                $var_lta = Model_Constant::find('first', array('where' => array('name' => 'lta')));
                $pf_value = Model_Constant::find('first', array('where' => array('name' => 'pf')));
                
                $var_medical = Model_Constant::find('first', array('where' => array('name' => 'medical')));
                $var_travel = Model_Constant::find('first', array('where' => array('name' => 'travel')));
                
                $var_adj_sdxo = $var_gross + $var_sdxo;
                $var_pf_adjust = (Input::post('pf_applicable') == "yes") ? ($var_adj_sdxo / $var_pf) : $var_adj_sdxo;        
                $var_basic = $var_basic_frac * $var_pf_adjust;
                $var_hra = $var_hra_frac * $var_pf_adjust;
                $var_pf_value = $pf_value * $var_basic;
                
                $salary = Model_Salary::forge(array(
                            'employee_id' => Input::post('employee_id'),
                            'month' => Input::post('month'),
                            'year' => Input::post('year'),
                            'lock' => 'false',
                            'pf_applicable' => Input::post('pf_applicable'),
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
                    Session::set_flash('success', 'Added salary #' . $salary->id . '.');

                    Response::redirect('salaries');
                } else {
                    Session::set_flash('error', 'Could not save salary.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Salaries";
        $this->template->content = View::forge('salaries/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('salaries');

        if (!$salary = Model_Salary::find($id)) {
            Session::set_flash('error', 'Could not find salary #' . $id);
            Response::redirect('salaries');
        }

        $val = Model_Salary::validate('edit');

        if ($val->run()) {
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

            if ($salary->save()) {
                Session::set_flash('success', 'Updated salary #' . $id);

                Response::redirect('salaries');
            } else {
                Session::set_flash('error', 'Could not update salary #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
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

}
