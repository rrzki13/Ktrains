<?php

namespace App\Controllers\manager;

use App\Models\UserModel;
use App\Controllers\BaseController;

class MyProfile extends BaseController
{
	protected $UserModel;
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Manager My Profile",
			"active" => "profile"
		];
		return view('manager/profile', $data);
	}

	//--------------------------------------------------------------------

}
