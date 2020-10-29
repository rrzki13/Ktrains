<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class WaitingTransaction extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Staff Waiting Transaction",
			"active" => "waiting"
		];
		return view('staff/waiting', $data);
	}

	//--------------------------------------------------------------------

}
