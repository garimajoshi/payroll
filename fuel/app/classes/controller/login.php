<?php

class Controller_Login extends Controller_Template
{

	public function action_index()
	{
		return Response::forge(View::forge('login/index'));
	}
	

}
