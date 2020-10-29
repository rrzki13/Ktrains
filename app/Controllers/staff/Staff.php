<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class Staff extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Staff Home",
			"active" => "home"
		];
		return view('staff/index', $data);
	}

	//--------------------------------------------------------------------

}
