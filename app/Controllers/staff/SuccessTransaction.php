<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class SuccessTransaction extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Staff Succes Transaction",
			"active" => "success"
		];
		return view('staff/success', $data);
	}

	//--------------------------------------------------------------------

}
