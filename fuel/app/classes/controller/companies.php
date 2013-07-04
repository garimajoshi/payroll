<?php

class Controller_Companies extends Controller_Base {

    public function action_index() {

        $data['companies'] = Model_Company::find('all');
        $this->template->title = "Companies";
        $this->template->content = View::forge('companies/index', $data);
    }

    public function action_view($id = null) {
        //parent::has_access("add_company");
        is_null($id) and Response::redirect('companies');

        if (!$data['company'] = Model_Company::find($id)) {
            Session::set_flash('error', 'Could not find company #' . $id);
            Response::redirect('companies');
        }

        $this->template->title = "Company";
        $this->template->content = View::forge('companies/view', $data);
    }

    public function action_create() {
        //parent::has_access("add_company");
        if (Input::method() == 'POST') {
            $val = Model_Company::validate('create');

            if ($val->run()) {
                $company = Model_Company::forge(array(
                            'address' => Input::post('address'),
                            'city' => Input::post('city'),
                            'state' => Input::post('state'),
                            'country' => Input::post('country'),
                            'pincode' => Input::post('pincode'),
                            'email' => Input::post('email'),
                            'website' => Input::post('website'),
                            'phone' => Input::post('phone'),
                            'fax' => Input::post('fax'),
                ));

                if ($company and $company->save()) {
                    Session::set_flash('success', 'Added company #' . $company->id . '.');

                    Response::redirect('companies');
                } else {
                    Session::set_flash('error', 'Could not save company.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Companies";
        $this->template->content = View::forge('companies/create');
    }

    public function action_edit($id = null) {
        //parent::has_access("add_company");
        is_null($id) and Response::redirect('companies');

        if (!$company = Model_Company::find($id)) {
            Session::set_flash('error', 'Could not find company #' . $id);
            Response::redirect('companies');
        }

        $val = Model_Company::validate('edit');

        if ($val->run()) {

            $company->address = Input::post('address');
            $company->city = Input::post('city');
            $company->state = Input::post('state');
            $company->country = Input::post('country');
            $company->pincode = Input::post('pincode');
            $company->email = Input::post('email');
            $company->website = Input::post('website');
            $company->phone = Input::post('phone');
            $company->fax = Input::post('fax');

            if ($company->save()) {
                Session::set_flash('success', 'Updated company #' . $id);

                Response::redirect('companies');
            } else {
                Session::set_flash('error', 'Could not update company #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {

                $company->address = $val->validated('address');
                $company->city = $val->validated('city');
                $company->state = $val->validated('state');
                $company->country = $val->validated('country');
                $company->pincode = $val->validated('pincode');
                $company->email = $val->validated('email');
                $company->website = $val->validated('website');
                $company->phone = $val->validated('phone');
                $company->fax = $val->validated('fax');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('company', $company, false);
        }

        $this->template->title = "Companies";
        $this->template->content = View::forge('companies/edit');
    }

    public function action_delete($id = null) {
        //parent::has_access("add_company");
        is_null($id) and Response::redirect('companies');

        if ($company = Model_Company::find($id)) {
            $company->delete();

            Session::set_flash('success', 'Deleted company #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete company #' . $id);
        }

        Response::redirect('companies');
    }

}