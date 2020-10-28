<?php

namespace App\Controllers\manager;

use App\Models\KeretaModel;
use App\Models\StasiunModel;
use App\Controllers\BaseController;

class AddStaff extends BaseController
{
	protected $KeretaModel;
	protected $StasiunModel;
	public function __construct()
	{
		$this->KeretaModel = new KeretaModel();
		$this->StasiunModel = new StasiunModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Manager Add Staff",
			"active" => "add_staff"
		];
		return view('manager/add_staff', $data);
	}

	//--------------------------------------------------------------------

}
