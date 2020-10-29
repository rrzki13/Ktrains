<?php

namespace App\Controllers\staff;

use App\Models\TiketOrderModel;
use App\Models\SuccessTransactionModel;
use App\Controllers\BaseController;

class SuccessTransaction extends BaseController
{
	protected $TiketOrderModel;
	protected $SuccessTransactionModel;
	public function __construct()
	{
		$this->TiketOrderModel = new TiketOrderModel();
		$this->SuccessTransactionModel = new SuccessTransactionModel();
	}

	public function index()
	{
		$successTransaction = $this->SuccessTransactionModel->getAllAndOrder();
		$data = [
			"title" => "Ktrains | Staff Succes Transaction",
			"active" => "success",
			"success" => $successTransaction
		];
		return view('staff/success', $data);
	}

	//--------------------------------------------------------------------

}
