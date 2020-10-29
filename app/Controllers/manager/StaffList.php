<?php

namespace App\Controllers\manager;

use App\Models\UserModel;
use App\Controllers\BaseController;

class StaffList extends BaseController
{
	protected $UserModel;
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function index()
	{
		$staff = $this->UserModel->getStaff();
		$data = [
			"title" => "Ktrains | Manager Staff List",
			"active" => "staff_list",
			"staff" => $staff
		];
		return view('manager/staff_list', $data);
	}

	//--------------------------------------------------------------------

}
