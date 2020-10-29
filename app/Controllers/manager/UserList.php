<?php

namespace App\Controllers\manager;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserList extends BaseController
{
	protected $UserModel;
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		$user = $this->UserModel->getAllUser();
		$data = [
			"title" => "Ktrains | Manager User List",
			"active" => "user",
			"user" => $user
		];
		return view('manager/user', $data);
	}

	//--------------------------------------------------------------------

}
