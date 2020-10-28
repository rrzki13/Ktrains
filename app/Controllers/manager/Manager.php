<?php

namespace App\Controllers\manager;

use App\Models\TiketOrderModel;
use App\Controllers\BaseController;

class Manager extends BaseController
{
	protected $TiketOrderModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
	}

	public function index()
	{
		$tiketOrder = $this->TiketOrderModel->getAll();
		$data = [
			"title" => "Ktrains | Manager Home",
			"active" => "home",
			"order" => $tiketOrder
		];
		return view('manager/index', $data);
	}

	//--------------------------------------------------------------------

}
