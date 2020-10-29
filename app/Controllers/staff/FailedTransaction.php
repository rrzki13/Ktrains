<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class FailedTransaction extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$data = [
			"title" => "Ktrains | Staff Failed Transaction",
			"active" => "failed"
		];
		return view('staff/fail', $data);
	}

	//--------------------------------------------------------------------

}
